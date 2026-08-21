<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'price_min',
        'price_max',
        'minimum_order',
        'image_url',
        'is_featured',
        'subtitle',
        'colors',
        'dimensions',
        'custom_method',
        'gallery_images',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'colors' => 'array',
            'gallery_images' => 'array',
        ];
    }

    public function getPriceLabelAttribute(): string
    {
        return 'Rp '.number_format($this->price_min, 0, ',', '.').' - '.number_format($this->price_max, 0, ',', '.');
    }

    public function getCategoryLabelAttribute(): string
    {
        return Str::headline($this->category);
    }
}
