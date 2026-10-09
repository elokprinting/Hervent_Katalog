<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public function roleAssignments(): HasMany
    {
        return $this->hasMany(RoleAssignment::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_assignments')
            ->withPivot('business_unit_id')
            ->distinct();
    }

    public function businessUnits(): BelongsToMany
    {
        return $this->belongsToMany(BusinessUnit::class, 'role_assignments')
            ->withPivot('role_id')
            ->distinct();
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'created_by');
    }

    /**
     * Determine whether this user has a role in the supplied business unit.
     * System roles are global and therefore apply to every unit.
     */
    public function hasRoleForUnit(string $roleSlug, BusinessUnit|int|null $businessUnit = null): bool
    {
        $businessUnitId = $businessUnit instanceof BusinessUnit ? $businessUnit->getKey() : $businessUnit;

        return $this->roleAssignments()
            ->whereHas('role', fn ($query) => $query->where('slug', $roleSlug))
            ->where(function ($query) use ($businessUnitId) {
                $query->whereNull('business_unit_id');

                if ($businessUnitId !== null) {
                    $query->orWhere('business_unit_id', $businessUnitId);
                }
            })
            ->exists();
    }

    public function canAccessBusinessUnit(BusinessUnit|int $businessUnit): bool
    {
        return $this->hasRoleForUnit(Role::SYSTEM_ADMIN, $businessUnit)
            || $this->roleAssignments()
                ->where('business_unit_id', $businessUnit instanceof BusinessUnit ? $businessUnit->getKey() : $businessUnit)
                ->exists();
    }

    public function hasPermissionForUnit(string $permissionSlug, BusinessUnit|int $businessUnit): bool
    {
        $businessUnitId = $businessUnit instanceof BusinessUnit ? $businessUnit->getKey() : $businessUnit;

        return $this->roleAssignments()
            ->where(function ($query) use ($businessUnitId) {
                $query->whereNull('business_unit_id')
                    ->orWhere('business_unit_id', $businessUnitId);
            })
            ->whereHas('role.permissions', fn ($query) => $query->where('slug', $permissionSlug))
            ->exists();
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
