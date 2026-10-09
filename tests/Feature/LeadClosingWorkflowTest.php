<?php

namespace Tests\Feature;

use App\Models\BusinessUnit;
use App\Models\Lead;
use App\Models\Order;
use App\Models\Quotation;
use App\Models\Role;
use App\Models\RoleAssignment;
use App\Models\User;
use Database\Seeders\ErpFoundationSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeadClosingWorkflowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(ErpFoundationSeeder::class);
    }

    public function test_only_the_latest_sent_quotation_can_be_accepted(): void
    {
        [$unit, $sales] = $this->salesUser();
        $lead = $this->completeLead($unit, $sales);
        $older = $this->sentQuotation($lead, 1, 1000000);
        $latest = $this->sentQuotation($lead, 2, 1200000);

        $this->actingAs($sales)
            ->postJson(route('erp.quotations.acceptance.store', [$lead, $older]))
            ->assertStatus(409);

        $this->actingAs($sales)
            ->postJson(route('erp.quotations.acceptance.store', [$lead, $latest]))
            ->assertOk()
            ->assertJsonPath('quotation.status', Quotation::STATUS_ACCEPTED);

        $this->assertDatabaseHas('quotations', [
            'id' => $latest->id,
            'status' => Quotation::STATUS_ACCEPTED,
            'accepted_by_user_id' => $sales->id,
        ]);
    }

    public function test_closing_requires_a_customer_phone_or_email(): void
    {
        [$unit, $sales] = $this->salesUser();
        $lead = $this->completeLead($unit, $sales, ['customer_email' => null, 'customer_phone' => null]);
        $this->acceptedQuotation($lead, $sales);

        $this->actingAs($sales)
            ->postJson(route('erp.leads.close', $lead))
            ->assertStatus(422)
            ->assertJsonPath('errors.customer_contact.0', 'Nomor kontak atau email pelanggan wajib diisi minimal salah satu.');

        $this->assertDatabaseCount('orders', 0);
    }

    public function test_closing_creates_one_order_snapshot_in_closing_status(): void
    {
        [$unit, $sales] = $this->salesUser();
        $lead = $this->completeLead($unit, $sales, [
            'customer_name' => 'PT Snapshot',
            'product_description' => 'Paket souvenir custom',
            'quantity' => 10,
        ]);
        $quotation = $this->acceptedQuotation($lead, $sales, 2500000);

        $response = $this->actingAs($sales)
            ->postJson(route('erp.leads.close', $lead))
            ->assertCreated()
            ->assertJsonPath('order.status', Order::STATUS_CLOSING);

        $orderId = $response->json('order.id');

        $this->assertDatabaseHas('leads', ['id' => $lead->id, 'status' => Lead::STATUS_CLOSING]);
        $this->assertDatabaseHas('orders', [
            'id' => $orderId,
            'lead_id' => $lead->id,
            'quotation_id' => $quotation->id,
            'customer_name' => 'PT Snapshot',
            'quotation_total' => '2500000.00',
            'status' => Order::STATUS_CLOSING,
        ]);
        $this->assertDatabaseHas('order_items', ['order_id' => $orderId, 'quantity' => 10]);

        $this->actingAs($sales)
            ->postJson(route('erp.leads.close', $lead->fresh()))
            ->assertStatus(409);

        $this->assertDatabaseCount('orders', 1);
    }

    public function test_only_sales_pic_or_system_admin_can_accept_and_close(): void
    {
        [$unit, $sales] = $this->salesUser();
        $otherSales = $this->salesUser($unit)[1];
        $lead = $this->completeLead($unit, $sales);
        $quotation = $this->sentQuotation($lead, 1, 900000);

        $this->actingAs($otherSales)
            ->postJson(route('erp.quotations.acceptance.store', [$lead, $quotation]))
            ->assertForbidden();

        $admin = User::factory()->create();
        RoleAssignment::create([
            'user_id' => $admin->id,
            'role_id' => Role::where('slug', Role::SYSTEM_ADMIN)->value('id'),
        ]);

        $this->actingAs($admin)
            ->postJson(route('erp.quotations.acceptance.store', [$lead, $quotation]))
            ->assertOk();

        $this->actingAs($admin)
            ->postJson(route('erp.leads.close', $lead))
            ->assertCreated();
    }

    public function test_accepted_quotation_is_locked_from_updates(): void
    {
        [$unit, $sales] = $this->salesUser();
        $lead = $this->completeLead($unit, $sales);
        $quotation = $this->acceptedQuotation($lead, $sales);

        $this->expectException(\LogicException::class);
        $quotation->update(['total' => 999999]);
    }

    /** @return array{0: BusinessUnit, 1: User} */
    private function salesUser(?BusinessUnit $unit = null): array
    {
        $unit ??= BusinessUnit::where('slug', 'hervent')->firstOrFail();
        $user = User::factory()->create();
        RoleAssignment::create([
            'user_id' => $user->id,
            'role_id' => Role::where('slug', Role::SALES)->value('id'),
            'business_unit_id' => $unit->id,
        ]);

        return [$unit, $user];
    }

    private function completeLead(BusinessUnit $unit, User $sales, array $overrides = []): Lead
    {
        return Lead::create(array_merge([
            'business_unit_id' => $unit->id,
            'customer_name' => 'Pelanggan ERP',
            'customer_email' => 'customer@example.com',
            'customer_phone' => null,
            'product_description' => 'Produk custom',
            'quantity' => 5,
            'deadline' => now()->addWeek()->toDateString(),
            'pic_user_id' => $sales->id,
            'created_by' => $sales->id,
        ], $overrides));
    }

    private function sentQuotation(Lead $lead, int $version, float $total): Quotation
    {
        return Quotation::create([
            'lead_id' => $lead->id,
            'version' => $version,
            'status' => Quotation::STATUS_SENT,
            'description' => 'Quotation v'.$version,
            'total' => $total,
            'sent_at' => now(),
            'created_by' => $lead->pic_user_id,
        ]);
    }

    private function acceptedQuotation(Lead $lead, User $sales, float $total = 1000000): Quotation
    {
        $quotation = $this->sentQuotation($lead, 1, $total);

        $response = $this->actingAs($sales)
            ->postJson(route('erp.quotations.acceptance.store', [$lead, $quotation]))
            ->assertOk();

        return Quotation::findOrFail($response->json('quotation.id'));
    }
}
