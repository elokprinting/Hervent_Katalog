<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('lead_id')->nullable()->unique()->after('id')->constrained()->restrictOnDelete();
            $table->foreignId('quotation_id')->nullable()->unique()->after('lead_id')->constrained()->restrictOnDelete();
            $table->string('customer_phone')->nullable()->after('customer_email');
            $table->date('deadline')->nullable()->after('quantity');
            $table->foreignId('sales_pic_id')->nullable()->after('created_by')->constrained('users')->nullOnDelete();
            $table->timestamp('closed_at')->nullable()->after('sales_pic_id');
            $table->foreignId('closed_by')->nullable()->after('closed_at')->constrained('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['closed_by']);
            $table->dropForeign(['sales_pic_id']);
            $table->dropForeign(['quotation_id']);
            $table->dropForeign(['lead_id']);
            $table->dropColumn([
                'lead_id', 'quotation_id', 'customer_phone', 'deadline',
                'sales_pic_id', 'closed_at', 'closed_by',
            ]);
        });
    }
};
