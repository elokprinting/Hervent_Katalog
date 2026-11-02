<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use InvalidArgumentException;

class RoleAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'role_id', 'business_unit_id'];

    protected static function booted(): void
    {
        static::saving(function (self $assignment): void {
            $isSystemRole = (bool) $assignment->role()->value('is_system');

            if ($assignment->business_unit_id === null && !$isSystemRole) {
                throw new InvalidArgumentException('Role operasional wajib memiliki business unit.');
            }

            if ($assignment->business_unit_id !== null && $isSystemRole) {
                throw new InvalidArgumentException('Role sistem harus bersifat global dan tidak boleh dibatasi ke business unit.');
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function businessUnit(): BelongsTo
    {
        return $this->belongsTo(BusinessUnit::class);
    }
}
