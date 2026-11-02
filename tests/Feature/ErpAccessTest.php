<?php

namespace Tests\Feature;

use App\Models\BusinessUnit;
use App\Models\Order;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleAssignment;
use App\Models\User;
use Database\Seeders\ErpFoundationSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Gate;
use Tests\TestCase;

class ErpAccessTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(ErpFoundationSeeder::class);
    }

    public function test_operational_roles_can_only_see_orders_in_their_assigned_business_unit(): void
    {
        $hervent = BusinessUnit::where('slug', 'hervent')->firstOrFail();
        $rayaPro = BusinessUnit::where('slug', 'raya-pro')->firstOrFail();
        $sales = Role::where('slug', Role::SALES)->firstOrFail();
        $user = User::factory()->create();

        RoleAssignment::create([
            'user_id' => $user->id,
            'role_id' => $sales->id,
            'business_unit_id' => $hervent->id,
        ]);

        $herventOrder = Order::create([
            'business_unit_id' => $hervent->id,
            'order_number' => 'HV-0001',
            'customer_name' => 'Pelanggan HerVent',
            'quotation_total' => 1250000,
        ]);
        $rayaProOrder = Order::create([
            'business_unit_id' => $rayaPro->id,
            'order_number' => 'RP-0001',
            'customer_name' => 'Pelanggan Raya Pro',
            'quotation_total' => 2250000,
        ]);

        $this->assertTrue(Gate::forUser($user)->allows('view', $herventOrder));
        $this->assertFalse(Gate::forUser($user)->allows('view', $rayaProOrder));
        $this->assertTrue($user->hasPermissionForUnit(Permission::QUOTATION_CREATE, $hervent));
        $this->assertFalse($user->hasPermissionForUnit(Permission::PRODUCTION_EXECUTE, $hervent));
    }

    public function test_one_user_can_combine_operational_roles_in_one_unit(): void
    {
        $unit = BusinessUnit::where('slug', 'gudang-flashdisk')->firstOrFail();
        $user = User::factory()->create();

        foreach ([Role::SALES, Role::PRODUCTION] as $roleSlug) {
            RoleAssignment::create([
                'user_id' => $user->id,
                'role_id' => Role::where('slug', $roleSlug)->value('id'),
                'business_unit_id' => $unit->id,
            ]);
        }

        $order = Order::create([
            'business_unit_id' => $unit->id,
            'order_number' => 'GF-0001',
            'customer_name' => 'Pelanggan Flashdisk',
        ]);

        $this->assertTrue(Gate::forUser($user)->allows('createQuotation', $order));
        $this->assertTrue(Gate::forUser($user)->allows('executeProduction', $order));
        $this->assertFalse(Gate::forUser($user)->allows('inspectQc', $order));
    }

    public function test_system_admin_is_global_and_can_be_combined_with_operational_roles(): void
    {
        $unit = BusinessUnit::where('slug', 'raya-pro')->firstOrFail();
        $admin = User::factory()->create();
        $adminRole = Role::where('slug', Role::SYSTEM_ADMIN)->firstOrFail();
        $salesRole = Role::where('slug', Role::SALES)->firstOrFail();

        RoleAssignment::create(['user_id' => $admin->id, 'role_id' => $adminRole->id]);
        RoleAssignment::create([
            'user_id' => $admin->id,
            'role_id' => $salesRole->id,
            'business_unit_id' => $unit->id,
        ]);

        $order = Order::create([
            'business_unit_id' => $unit->id,
            'order_number' => 'RP-0002',
            'customer_name' => 'Pelanggan Admin',
        ]);

        $this->assertTrue($admin->canAccessBusinessUnit($unit));
        $this->assertTrue(Gate::forUser($admin)->allows('view', $order));
        $this->assertTrue(Gate::forUser($admin)->allows('inspectQc', $order));
    }

    public function test_order_listing_scope_is_limited_to_assigned_units(): void
    {
        $hervent = BusinessUnit::where('slug', 'hervent')->firstOrFail();
        $rayaPro = BusinessUnit::where('slug', 'raya-pro')->firstOrFail();
        $user = User::factory()->create();
        $sales = Role::where('slug', Role::SALES)->firstOrFail();

        RoleAssignment::create([
            'user_id' => $user->id,
            'role_id' => $sales->id,
            'business_unit_id' => $hervent->id,
        ]);

        Order::create(['business_unit_id' => $hervent->id, 'order_number' => 'HV-0003', 'customer_name' => 'A']);
        Order::create(['business_unit_id' => $rayaPro->id, 'order_number' => 'RP-0003', 'customer_name' => 'B']);

        $this->assertSame(['HV-0003'], Order::visibleTo($user)->pluck('order_number')->all());
    }

    public function test_operational_role_cannot_be_assigned_without_a_business_unit(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        RoleAssignment::create([
            'user_id' => User::factory()->create()->id,
            'role_id' => Role::where('slug', Role::SALES)->value('id'),
        ]);
    }
}
