<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    public const OCCASION_CATEGORIES = [
        'onboarding-karyawan' => 'Corporate Gift',
        'seminar-training' => 'Seminar & Training',
        'gathering-anniversary' => 'Gathering & Anniversary',
        'apresiasi-klien-vip' => 'Client Appreciation',
        'event-pameran' => 'Event & Exhibition',
        'holidays-hampers' => 'Holiday Hampers',
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
        'mouse' => 'Computer Accessories (Wireless Mouse)',
        'power-bank' => 'Power Bank',
        'powerbank' => 'Power Bank',
        'speaker' => 'Elektronik Lainnya',
        'bluetooth-speaker' => 'Elektronik Lainnya',
        'travel-adapter' => 'Elektronik Lainnya',
        'travel-adaptor' => 'Elektronik Lainnya',
        'tws-soundcore' => 'Bluetooth Headset',
        'pin' => 'Pin',
        'tas' => 'Tas',
        'umbrella' => 'Umbrella',
        'packaging-accesoris' => 'Packaging & Accessories',
    ];

    public const PRODUCT_GROUPS = [
        'apparel-lifestyle' => [
            'label' => 'Apparel & Lifestyle',
            'categories' => ['baseball-hat', 'bonnie-hat', 'jacket', 'leather-wallet', 'neck-pillow', 'payung-lipat-3', 'polo-shirt', 't-shirt', 'vest', 'payung-lipat', 'shirt'],
        ],
        'bags-pouch' => [
            'label' => 'Bags & Pouch',
            'categories' => ['backpack', 'pouch', 'sling-bag', 'tote-bag', 'waist-bag'],
        ],
        'drinkware-dining' => [
            'label' => 'Drinkware & Dining',
            'categories' => ['lunch-box', 'tumbler'],
        ],
        'gift-sets' => [
            'label' => 'Gift Sets',
            'categories' => ['gift-set'],
        ],
        'office-stationery' => [
            'label' => 'Office & Stationery',
            'categories' => ['agenda-custom', 'card-holder', 'clock', 'desk-calendar', 'eco-notes', 'lanyard', 'mouse-pad', 'pen-pinnacle', 'pin', 'plakat'],
        ],
        'tech-gadgets' => [
            'label' => 'Tech & Gadgets',
            'categories' => ['bluetooth-speaker', 'flashdrive', 'laptop-bag', 'mouse', 'powerbank', 'tws-soundcore', 'travel-adaptor'],
        ],
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
        'included_items',
        'specifications',
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
            'included_items' => 'array',
            'specifications' => 'array',
        ];
    }

    public function getPriceLabelAttribute(): string
    {
        return 'Rp ' . number_format($this->price_min, 0, ',', '.') . ' - ' . number_format($this->price_max, 0, ',', '.');
    }

    public function getImageUrlAttribute(?string $value): ?string
    {
        if (! $value || ! Str::startsWith($value, ['/images/products/', 'images/products/'])) {
            return $value;
        }

        $path = ltrim($value, '/');
        $segments = array_map('rawurlencode', explode('/', $path));

        return '/' . implode('/', $segments);
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
