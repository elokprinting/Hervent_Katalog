<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $root = public_path('images/products');
        $files = File::allFiles($root);
        $managedPrefixes = [
            'images/products/Product/',
            'images/products/Corporate Gift/',
            'images/products/Seminar & Training/',
            'images/products/Gathering & Anniversary/',
            'images/products/Client Appreciation/',
            'images/products/Holiday & Hampers/',
        ];
        $excludedFiles = [
            'Corporate Gift/Corporate gift 1.png',
            'Corporate Gift/Corporate gift 2.png',
            'Client Appreciation/client appreciation.png',
            'Client Appreciation/client appreciation 2.png',
            'Holiday & Hampers/hampers rame.png',
            'Holiday & Hampers/holiday rame.png',
            'Seminar & Training/Seminar.png',
            'Seminar & Training/training rame.png',
            'Gathering & Anniversary/rame rame.png',
            'Event & Exhibition/Event .png',
            'Event & Exhibition/Exhibition.png',
            'Gathering & Anniversary/Selamat Datang Dikawasan Wisata.png',
        ];

        Product::query()
            ->where(function ($query) use ($managedPrefixes) {
                $query->where('image_url', 'like', '%unsplash.com%');
                foreach ($managedPrefixes as $prefix) {
                    $query->orWhere('image_url', 'like', $prefix . '%');
                    $query->orWhere('image_url', 'like', '/' . $prefix . '%');
                }
            })
            ->delete();

        foreach ($files as $index => $file) {
            $relativePath = str_replace('\\', '/', $file->getRelativePathname());
            if (in_array($relativePath, $excludedFiles, true)) {
                continue;
            }
            $parts = explode('/', $relativePath);
            $topFolder = $parts[0] ?? '';
            $isProductFolder = $topFolder === 'Product';
            $isGiftSet = $isProductFolder
                ? ($parts[1] ?? '') === 'Gift Sets'
                : in_array($topFolder, [
                    'Corporate Gift',
                    'Seminar & Training',
                    'Gathering & Anniversary',
                    'Client Appreciation',
                    'Holiday & Hampers',
                ], true);

            $category = $isGiftSet
                ? 'gift-set'
                : $this->categoryFromPath($parts, $file->getFilename());
            $catalogCategory = $isProductFolder ? null : $this->catalogCategoryFromFolder($topFolder);
            $name = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $name = $this->packageName($relativePath, $name);
            $slug = Str::slug($relativePath);
            $includedItems = $isGiftSet ? $this->includedItems($name) : null;
            $techDetails = $this->techDetails($relativePath);

            Product::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $name,
                    'category' => $category,
                    'catalog_category' => $catalogCategory,
                    'product_type' => $isGiftSet ? 'package' : 'single',
                    'description' => $techDetails['description'] ?? ($isGiftSet
                        ? 'Giftset Premium dengan ' . count($includedItems) . ' produk.'
                        : 'Produk promosi berkualitas yang dapat dikustomisasi dengan identitas brand perusahaan.'),
                    'included_items' => $includedItems,
                    'specifications' => $techDetails['specifications'] ?? null,
                    'price_min' => $isGiftSet ? 150000 : 25000,
                    'price_max' => $isGiftSet ? 750000 : 250000,
                    'minimum_order' => $isGiftSet ? 25 : 50,
                    'image_url' => '/images/products/' . $relativePath,
                    'is_featured' => $index < 6,
                ]
            );
        }

        Cache::forget('products.categories.v4');
    }

    private function categoryFromPath(array $parts, string $filename): string
    {
        if (strtolower($parts[0] ?? '') === 'product') {
            if (($parts[1] ?? '') === 'drinkware and dinning' && isset($parts[2])) {
                return Str::slug($parts[2]);
            }

            return Str::slug(pathinfo($filename, PATHINFO_FILENAME));
        }

        $category = Str::slug(pathinfo($filename, PATHINFO_FILENAME));
        if (Str::startsWith($category, ['falshdrive', 'flashdrive'])) {
            return 'flashdrive';
        }

        return $category;
    }

    private function catalogCategoryFromFolder(string $folder): string
    {
        return [
            'Corporate Gift' => 'onboarding-karyawan',
            'Seminar & Training' => 'seminar-training',
            'Gathering & Anniversary' => 'gathering-anniversary',
            'Client Appreciation' => 'apresiasi-klien-vip',
            'Event & Exhibition' => 'event-pameran',
            'Holiday & Hampers' => 'holidays-hampers',
        ][$folder] ?? 'gathering-anniversary';
    }

    private function includedItems(string $name): array
    {
        return match (Str::slug($name)) {
            'ethnic-echo' => ['Notebook custom', 'Pulpen premium', 'Keychain', 'Gift box'],
            'supreme-spectra' => ['Tumbler custom', 'Notebook custom', 'Pulpen premium', 'Gift box'],
            'synergi-seminar-package' => ['Seminar kit', 'Notebook custom', 'Pulpen', 'Lanyard', 'Gift box'],
            default => ['Produk custom pilihan', 'Packaging eksklusif'],
        };
    }

    private function packageName(string $relativePath, string $default): string
    {
        return [
            'Corporate Gift/Corporate gift produk.png' => 'Corporate Gift Set',
            'Seminar & Training/Produk Seminar.png' => 'Seminar Set',
            'Seminar & Training/produk training.png' => 'Training Set',
            'Gathering & Anniversary/Kumpulan Produk.png' => 'Gathering Set',
            'Gathering & Anniversary/produk setengah.png' => 'Anniversary Set',
            'Client Appreciation/client produk.png' => 'Client Set',
            'Event & Exhibition/event produk.png' => 'Event Set',
            'Event & Exhibition/exhibition produk.png' => 'Exhibition Set',
            'Holiday & Hampers/hampers produk.png' => 'Holiday Hampers Set',
        ][$relativePath] ?? $default;
    }

    private function techDetails(string $relativePath): ?array
    {
        return [
            'Product/Tech And Gadgets/Bluetooth speaker.png' => [
                'description' => 'Speaker portabel dengan pilihan model Beat, Blastube, Bounce, Bliss, Bolt, dan Blissely.',
                'specifications' => [
                    'Kategori' => 'Elektronik Lainnya',
                    'Baterai' => '300-600 mAh, durasi pemakaian sekitar 2-3 jam',
                    'Garansi' => '1 Tahun',
                    'Varian model' => 'Beat, Blastube, Bounce (Aluminium), Bliss, Bolt, Blissely (Aluminium)',
                ],
            ],
            'Product/Tech And Gadgets/Mouse.png' => [
                'description' => 'Mouse wireless berbahan plastik berwarna putih untuk kebutuhan kerja sehari-hari.',
                'specifications' => [
                    'Kategori' => 'Computer Accessories (Wireless Mouse)',
                    'Koneksi' => 'Wireless',
                    'Material' => 'Plastik',
                    'Warna' => 'Putih',
                    'Garansi' => '1 Tahun',
                    'Varian model' => 'Motion, Mingle, Meridian',
                ],
            ],
            'Product/Tech And Gadgets/Powerbank.png' => [
                'description' => 'Power Bank Arden dengan Real Capacity. Beberapa model dilengkapi LED Display untuk menunjukkan persentase baterai.',
                'specifications' => [
                    'Merek' => 'Arden',
                    'Kapasitas rendah' => '2.000-5.200 mAh: Pathway, Prodigy, Polarcharge (Aluminium), Propel, Prismly, Plutos, Phantom (Aluminium)',
                    'Kapasitas menengah' => '6.000-8.000 mAh: Polaris (Plastik + Kulit), Pioneer (Aluminium), Phenom (Aluminium)',
                    'Kapasitas besar' => '10.000 mAh: Portal, Pulse (Plastik + Kulit), Photon (Aluminium), Pact (Metal), Prism, Prower (Plastik), Pandora',
                    'Garansi' => 'Umumnya 18 Bulan; satu model memiliki garansi 1 Bulan',
                    'Cetak logo' => 'Screen Printing, Digital Printing, Laser Engraving',
                ],
            ],
            'Product/Tech And Gadgets/Travel Adaptor.png' => [
                'description' => 'Colokan adaptor universal yang dirancang untuk kebutuhan bepergian.',
                'specifications' => [
                    'Kategori' => 'Elektronik Lainnya',
                    'Garansi' => '1 Tahun',
                    'Varian model' => 'Traverse (maks. 2.1A), Triumph (maks. 2.1A), Translink (maks. 1A), Toggle (maks. 1A)',
                ],
            ],
            'Product/Tech And Gadgets/TWS Soundcore.png' => [
                'description' => 'Headset nirkabel berbahan plastik berwarna putih dengan durasi pemakaian sekitar 3 jam.',
                'specifications' => [
                    'Kategori' => 'Bluetooth Headset',
                    'Material' => 'Plastik',
                    'Warna' => 'Putih',
                    'Durasi baterai' => 'Sekitar 3 jam',
                    'Model terbaru' => 'Hype',
                ],
            ],
            'Product/drinkware and dinning/Tumbler/Jupiter.jpg' => [
                'description' => 'Vacuum flask dengan konstruksi double 304 stainless steel untuk menjaga suhu minuman.',
                'specifications' => [
                    'Kategori & material' => 'Vacuum Flask (Double 304 Stainless Steel)',
                    'Dimensi & kapasitas' => '20,5 x 6,8 x 6,8 cm; 350 ml',
                    'Pilihan warna' => 'Hitam, Biru, Merah Muda',
                    'Pilihan cetak logo' => 'Screen Printing',
                ],
            ],
            'Product/drinkware and dinning/Tumbler/Indigo.jpg' => [
                'description' => 'Botol aluminium ringan dengan kombinasi material aluminium dan PP.',
                'specifications' => [
                    'Kategori & material' => 'Botol Aluminium (Aluminium + PP)',
                    'Dimensi & kapasitas' => '22 x 7,5 x 7,5 cm; 600 ml',
                    'Pilihan warna' => 'Oranye, Biru, Hijau, Merah',
                    'Pilihan cetak logo' => 'Screen Printing, Laser Engraving',
                ],
            ],
            'Product/drinkware and dinning/Tumbler/Florida.jpg' => [
                'description' => 'Sport bottle praktis berbahan AS dan PP untuk menemani aktivitas sehari-hari.',
                'specifications' => [
                    'Kategori & material' => 'Sport Bottle (AS + PP)',
                    'Dimensi & kapasitas' => '22 x 7 x 7 cm; 560 ml',
                    'Pilihan warna' => 'Hitam, Ungu, Turkish, Oranye, Biru, Hijau, Merah',
                    'Pilihan cetak logo' => 'Screen Printing',
                ],
            ],
            'Product/drinkware and dinning/Tumbler/Daytona.jpg' => [
                'description' => 'Insert paper tumbler dengan inner PP dan outer AS yang dapat dikustomisasi.',
                'specifications' => [
                    'Kategori & material' => 'Insert Paper Tumbler (Inner PP, Outer AS)',
                    'Dimensi & kapasitas' => '21 x 7,5 x 6,5 cm; 430 ml',
                    'Pilihan warna' => 'Biru, Merah, Oranye, Hijau, Abu-abu',
                    'Pilihan cetak logo' => 'Screen Printing, Print Full Color',
                ],
            ],
            'Product/drinkware and dinning/Tumbler/Arizona.jpg' => [
                'description' => 'Termos stainless berbahan 18/8 stainless steel untuk kebutuhan minum sehari-hari.',
                'specifications' => [
                    'Kategori & material' => 'Termos Stainless (18/8 Stainless Steel)',
                    'Dimensi & kapasitas' => '25 x 7,5 x 7,5 cm; 600 ml',
                    'Pilihan warna' => 'Perak, Cokelat, Hijau',
                    'Pilihan cetak logo' => 'Screen Printing, Laser Engraving',
                ],
            ],
            'Product/office and stationary/Agenda Custom.png' => [
                'description' => 'Agenda premium berbahan PU Leather dengan fitur pengunci magnet, tali pengikat, dan ruang khusus untuk menyimpan pulpen.',
                'specifications' => [
                    'Material & fitur' => 'PU Leather premium, pengunci magnet, tali pengikat, ruang pulpen',
                    'Model yang tersedia' => 'Invent, Verb, Venture, Petaluxe',
                ],
            ],
            'Product/office and stationary/Eco Notes.png' => [
                'description' => 'Buku catatan ramah lingkungan yang dibuat dari kertas daur ulang dengan desain praktis dan fungsional.',
                'specifications' => [
                    'Material' => 'Kertas daur ulang',
                    'Varian' => 'Recyclerite, mini book dengan sticky notes',
                ],
            ],
            'Product/office and stationary/Pen Pinnacle.png' => [
                'description' => 'Pulpen premium dengan bahan plastik, metal, maupun kayu serta pilihan branding yang luas untuk kebutuhan corporate gifting.',
                'specifications' => [
                    'Material' => 'Plastik, metal (Luxora, Twiluxe, Clipper), kayu',
                    'Opsi branding' => 'Screen Printing, Laser Engraving, DTF UV',
                    'Fitur tambahan' => 'Ruang transparan untuk insert paper',
                ],
            ],
            'Product/office and stationary/Clock.png' => [
                'description' => 'Jam untuk kebutuhan kantor dan ruang kerja dengan pilihan dinding, meja, hingga desain digital modern.',
                'specifications' => [
                    'Jenis jam' => 'Jam dinding plastik, jam meja kulit (Svelte, Richhour), jam meja kayu, jam digital LED (Cyclock, Multitime)',
                ],
            ],
            'Product/office and stationary/Card Holder.png' => [
                'description' => 'Tempat kartu nama premium untuk kebutuhan branding, presentasi, dan identitas bisnis.',
                'specifications' => [
                    'Material' => 'Metal dan kulit',
                    'Kategori' => 'Merchandise cetak dan lainnya',
                ],
            ],
            'Product/office and stationary/Desk Calendar.png' => [
                'description' => 'Layanan cetak kalender meja maupun kalender dinding custom sesuai kebutuhan brand perusahaan.',
                'specifications' => [
                    'Kategori' => 'Produk percetakan (Printing)',
                    'Pilihan' => 'Kalender meja dan kalender dinding custom',
                ],
            ],
            'Product/office and stationary/Pin.png' => [
                'description' => 'Aneka pin dan gantungan kunci sebagai pelengkap souvenir dan merchandise promosi.',
                'specifications' => [
                    'Kategori' => 'Produk cetak & lainnya',
                    'Detail' => 'Pin dan gantungan kunci',
                ],
            ],
            'Product/Bags and Pouch/Backpack.png' => [
                'description' => 'Ransel yang dirancang untuk kebutuhan harian, bekerja, maupun sekolah dan kuliah dengan kapasitas lebih besar dan kompartemen fungsional.',
                'specifications' => [
                    'Model yang tersedia' => 'Black Hole, Supernova, Saturn',
                    'Detail' => 'Kapasitas lebih besar, kompartemen fungsional untuk kebutuhan harian',
                ],
            ],
            'Product/Bags and Pouch/Pouch.png' => [
                'description' => 'Tas kecil yang praktis untuk menyimpan perlengkapan traveling, gadget, atau kebutuhan harian dengan bahan tahan air.',
                'specifications' => [
                    'Model yang tersedia' => 'Journey Travel Pouch, Hydro Waterproof Pouch',
                    'Detail' => 'Cocok untuk travel, gadget, dan aksesoris sehari-hari, tersedia opsi waterproof',
                ],
            ],
            'Product/Bags and Pouch/Sling Bag.png' => [
                'description' => 'Tas kasual yang nyaman dipakai di bahu atau pinggang untuk mobilitas tinggi, kegiatan santai, dan traveling.',
                'specifications' => [
                    'Model yang tersedia' => 'Andromeda, Jupiter, serta model sejenis lainnya',
                    'Detail' => 'Praktis dan ringan, ideal untuk mobilitas tinggi dan aktivitas sehari-hari',
                ],
            ],
            'Product/Bags and Pouch/Waist Bag.png' => [
                'description' => 'Tas pinggang yang portable dan praktis untuk kebutuhan santai, aktivitas luar ruangan, serta perjalanan ringan.',
                'specifications' => [
                    'Model yang tersedia' => 'Andromeda, Jupiter, serta model sejenis lainnya',
                    'Detail' => 'Dikenakan di pinggang, ringan, dan cocok untuk kegiatan santai hingga traveling',
                ],
            ],
            'Product/Bags and Pouch/Tote Bag.png' => [
                'description' => 'Tas jinjing serbaguna yang cocok untuk corporate merchandise, seminar kit, maupun kebutuhan harian dengan material pilihan premium hingga ramah lingkungan.',
                'specifications' => [
                    'Varian bahan' => 'Leather, Gunny, Denim, Canvas, Blacu, Goodie Bag Spunbond',
                    'Detail' => 'Serbaguna untuk promo brand, seminar kit, dan penggunaan harian',
                ],
            ],
        ][$relativePath] ?? null;
    }
}
