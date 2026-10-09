<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'is_operational'];

    protected function casts(): array
    {
        return ['is_operational' => 'boolean'];
    }

    public function roles(): HasMany
    {
        return $this->hasMany(Role::class);
    }
}
