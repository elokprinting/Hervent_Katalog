<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('products')
            ->whereIn('id', [504, 506])
            ->delete();

        DB::table('products')
            ->whereIn('id', [428, 429, 430, 431])
            ->update(['catalog_category' => 'event-pameran']);

        DB::table('products')
            ->whereIn('id', [433, 435])
            ->update(['catalog_category' => 'seminar-training']);
    }

    public function down(): void
    {
        DB::table('products')
            ->whereIn('id', [428, 429, 430, 431])
            ->update(['catalog_category' => 'gathering-anniversary']);

        DB::table('products')
            ->whereIn('id', [433, 435])
            ->update(['catalog_category' => 'gathering-anniversary']);
    }
};
