<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lead extends Model
{
    use HasFactory;

    public const STATUS_OPEN = 'open';

    public const STATUS_CLOSING = 'closing';

    protected $fillable = [
        'business_unit_id', 'customer_name', 'customer_email', 'customer_phone',
        'product_description', 'quantity', 'deadline', 'pic_user_id', 'created_by',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'deadline' => 'date',
            'closed_at' => 'datetime',
        ];
    }

    public function businessUnit(): BelongsTo
    {
        return $this->belongsTo(BusinessUnit::class);
    }

    public function pic(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pic_user_id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function closer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'closed_by');
    }

    public function quotations(): HasMany
    {
        return $this->hasMany(Quotation::class)->orderByDesc('version');
    }

    public function latestQuotation(): HasOne
    {
        return $this->hasOne(Quotation::class)->latestOfMany('version');
    }

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }

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

    public function isClosing(): bool
    {
        return $this->status === self::STATUS_CLOSING;
    }
}
