<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('products')
            ->whereIn('id', [433, 435, 438, 439, 420, 421, 424, 425])
            ->delete();
    }

    public function down(): void
    {
        // The removed records are managed by the product import and are not recreated here.
    }
};
