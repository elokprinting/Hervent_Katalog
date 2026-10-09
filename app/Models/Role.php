<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    public const SYSTEM_ADMIN = 'system-admin';

    public const SALES = 'sales';

    public const PRODUCTION = 'production';

    public const QC = 'qc';

    public const LOGISTICS = 'logistics';

    public const AFTER_SALES = 'after-sales';

    protected $fillable = ['name', 'slug', 'department_id', 'is_system', 'description'];

    protected function casts(): array
    {
        return ['is_system' => 'boolean'];
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(RoleAssignment::class);
    }
}
