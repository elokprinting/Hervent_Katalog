<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    public const OCCASION_CATEGORIES = [
        'gathering-anniversary' => 'Gathering & Anniversary',
        'seminar-training' => 'Seminar & Training',
        'holidays-hampers' => 'Hari Raya & Hampers',
        'onboarding-karyawan' => 'Onboarding Karyawan',
        'apresiasi-klien-vip' => 'Apresiasi Klien & VIP',
        'event-pameran' => 'Event & Pameran',
    ];

    public const PRODUCT_CATEGORIES = [
        'gift-set' => 'Gift Set',
        'bottle' => 'Botol',
        'tumbler' => 'Tumbler',
        'mug' => 'Mug',
        'lunch-box' => 'Lunch Box',
        'straw-set' => 'Straw Set',
        'thermos' => 'Thermos',
        'agenda-custom' => 'Agenda Custom',
        'calender' => 'Calendar',
        'card-holder' => 'Card Holder',
        'stationary' => 'Stationery',
        'table-clock' => 'Table Clock',
        'flashdrive' => 'Flashdrive',
        'headset' => 'Headset',
        'mouse' => 'Mouse',
        'power-bank' => 'Power Bank',
        'speaker' => 'Speaker',
        'travel-adapter' => 'Travel Adapter',
        'pin' => 'Pin',
        'tas' => 'Tas',
        'umbrella' => 'Umbrella',
        'packaging-accesoris' => 'Packaging & Accessories',
    ];

    public const PRODUCT_TYPES = [
        'package' => 'Paketan',
        'single' => 'Barang Satuan',
    ];

    protected $fillable = [
        'name',
        'slug',
        'category',
        'product_type',
        'catalog_category',
        'description',
        'stock',
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
        return 'Rp ' . number_format($this->price_min, 0, ',', '.') . ' - ' . number_format($this->price_max, 0, ',', '.');
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::PRODUCT_CATEGORIES[$this->category] ?? Str::headline($this->category);
    }

    public function getCatalogCategoryLabelAttribute(): string
    {
        return self::OCCASION_CATEGORIES[$this->catalog_category] ?? Str::headline((string) $this->catalog_category);
    }

    public function getProductTypeLabelAttribute(): string
    {
        return self::PRODUCT_TYPES[$this->product_type] ?? Str::headline((string) $this->product_type);
    }
}
