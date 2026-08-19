<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->index('category', 'products_category_index');
            $table->index('is_featured', 'products_featured_index');
            $table->index('price_min', 'products_price_min_index');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('products_category_index');
            $table->dropIndex('products_featured_index');
            $table->dropIndex('products_price_min_index');
        });
    }
};
