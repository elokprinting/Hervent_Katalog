<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    public const STATUS_LEAD = 'lead';

    public const STATUS_CLOSING = 'closing';

    public const STATUS_CANCELLED = 'cancelled';

    protected $fillable = [
        'business_unit_id', 'lead_id', 'quotation_id',
        'order_number',
        'customer_name', 'customer_email', 'customer_phone',
        'product_description',
        'quantity', 'deadline', 'quotation_total', 'status',
        'created_by', 'sales_pic_id', 'closed_at', 'closed_by',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'quotation_total' => 'decimal:2',
            'deadline' => 'date',
            'closed_at' => 'datetime',
        ];
    }

    public function businessUnit(): BelongsTo
    {
        return $this->belongsTo(BusinessUnit::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    public function quotation(): BelongsTo
    {
        return $this->belongsTo(Quotation::class);
    }

    public function salesPic(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sales_pic_id');
    }

    public function closer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'closed_by');
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Restrict an order listing to the business units assigned to a user.
     * System administrators are intentionally unrestricted.
     */
    public function scopeVisibleTo(Builder $query, User $user): Builder
    {
        if ($user->hasRoleForUnit(Role::SYSTEM_ADMIN)) {
            return $query;
        }

        $businessUnitIds = $user->roleAssignments()
            ->whereNotNull('business_unit_id')
            ->pluck('business_unit_id');

        return $query->whereIn('business_unit_id', $businessUnitIds);
    }
}
