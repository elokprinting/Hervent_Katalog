<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('products')
            ->whereIn('id', [514, 512, 428, 429])
            ->delete();
    }

    public function down(): void
    {
        // Removed records are excluded from the managed product import.
    }
};
