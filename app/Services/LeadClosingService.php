<?php

namespace App\Services;

use App\Exceptions\WorkflowRuleException;
use App\Models\Lead;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LeadClosingService
{
    public function recordQuotationAcceptance(Quotation $quotation, User $actor): Quotation
    {
        return DB::transaction(function () use ($quotation, $actor): Quotation {
            $quotation = Quotation::query()->with('lead')->lockForUpdate()->findOrFail($quotation->id);
            $lead = Lead::query()->lockForUpdate()->findOrFail($quotation->lead_id);

            $this->ensureLatestSentQuotation($quotation, $lead);

            if ($quotation->isLocked()) {
                throw new WorkflowRuleException('Quotation tersebut sudah disetujui dan dikunci.');
            }

            $quotation->forceFill([
                'status' => Quotation::STATUS_ACCEPTED,
                'accepted_at' => now(),
                'accepted_by_user_id' => $actor->id,
                'locked_at' => now(),
            ])->save();

            return $quotation->fresh();
        });
    }

    public function closeLead(Lead $lead, User $actor): Order
    {
        return DB::transaction(function () use ($lead, $actor): Order {
            $lead = Lead::query()->lockForUpdate()->findOrFail($lead->id);

            if ($lead->isClosing()) {
                throw new WorkflowRuleException('Lead sudah berstatus Closing dan tidak dapat dibuka kembali.');
            }

            $this->ensureLeadCompleteness($lead);
            $quotation = Quotation::query()
                ->where('lead_id', $lead->id)
                ->orderByDesc('version')
                ->lockForUpdate()
                ->first();

            if (! $quotation || $quotation->status !== Quotation::STATUS_ACCEPTED || ! $quotation->isLocked()) {
                throw new WorkflowRuleException('Quotation terbaru harus sudah disetujui pelanggan sebelum Lead dapat Closing.');
            }

            $existingOrder = Order::query()->where('lead_id', $lead->id)->first();
            if ($existingOrder) {
                throw new WorkflowRuleException('Lead ini sudah memiliki Order.');
            }

            $closedAt = now();
            $lead->forceFill([
                'status' => Lead::STATUS_CLOSING,
                'closed_at' => $closedAt,
                'closed_by' => $actor->id,
            ])->save();

            $order = Order::create([
                'business_unit_id' => $lead->business_unit_id,
                'lead_id' => $lead->id,
                'quotation_id' => $quotation->id,
                'order_number' => $this->orderNumber($lead->business_unit_id),
                'customer_name' => $lead->customer_name,
                'customer_email' => $lead->customer_email,
                'customer_phone' => $lead->customer_phone,
                'product_description' => $lead->product_description,
                'quantity' => $lead->quantity,
                'deadline' => $lead->deadline,
                'quotation_total' => $quotation->total,
                'status' => Order::STATUS_CLOSING,
                'created_by' => $lead->created_by ?? $actor->id,
                'sales_pic_id' => $lead->pic_user_id,
                'closed_at' => $closedAt,
                'closed_by' => $actor->id,
            ]);

            OrderItem::create([
                'order_id' => $order->id,
                'description' => $lead->product_description ?: 'Item order dari Lead',
                'quantity' => $lead->quantity,
                'unit_price' => $lead->quantity > 0 ? ((float) $quotation->total / $lead->quantity) : null,
                'line_total' => $quotation->total,
            ]);

            return $order->load(['items', 'lead', 'quotation']);
        });
    }

    private function ensureLatestSentQuotation(Quotation $quotation, Lead $lead): void
    {
        $latest = $lead->quotations()->first();

        if (! $latest || $latest->id !== $quotation->id || $quotation->status !== Quotation::STATUS_SENT || $quotation->sent_at === null) {
            throw new WorkflowRuleException('Hanya quotation terbaru yang sudah dikirim yang dapat disetujui.');
        }
    }

    private function ensureLeadCompleteness(Lead $lead): void
    {
        $errors = [];

        if (blank($lead->customer_name)) {
            $errors['customer_name'][] = 'Nama pelanggan wajib diisi.';
        }
        if (blank($lead->product_description)) {
            $errors['product_description'][] = 'Item/produk wajib diisi.';
        }
        if (! $lead->quantity || $lead->quantity < 1) {
            $errors['quantity'][] = 'Jumlah harus lebih besar dari 0.';
        }
        if (! $lead->deadline) {
            $errors['deadline'][] = 'Deadline wajib diisi.';
        }
        if (! $lead->pic_user_id) {
            $errors['pic_user_id'][] = 'PIC wajib ditentukan.';
        }
        if (blank($lead->customer_phone) && blank($lead->customer_email)) {
            $errors['customer_contact'][] = 'Nomor kontak atau email pelanggan wajib diisi minimal salah satu.';
        }

        if ($errors) {
            throw new WorkflowRuleException('Data utama Lead belum lengkap.', 422, $errors);
        }
    }

    private function orderNumber(int $businessUnitId): string
    {
        do {
            $number = 'ORD-'.$businessUnitId.'-'.now()->format('YmdHis').'-'.Str::upper(Str::random(4));
        } while (Order::query()->where('order_number', $number)->exists());

        return $number;
    }
}
