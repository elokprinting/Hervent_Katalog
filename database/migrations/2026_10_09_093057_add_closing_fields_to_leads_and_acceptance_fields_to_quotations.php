<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->string('status')->default('open')->after('created_by');
            $table->timestamp('closed_at')->nullable()->after('status');
            $table->foreignId('closed_by')->nullable()->after('closed_at')->constrained('users')->nullOnDelete();
        });

        Schema::table('quotations', function (Blueprint $table) {
            $table->timestamp('accepted_at')->nullable()->after('sent_at');
            $table->foreignId('accepted_by_user_id')->nullable()->after('accepted_at')->constrained('users')->nullOnDelete();
            $table->timestamp('locked_at')->nullable()->after('accepted_by_user_id');
        });
    }

    public function down(): void
    {
        Schema::table('quotations', function (Blueprint $table) {
            $table->dropForeign(['accepted_by_user_id']);
            $table->dropColumn(['accepted_at', 'accepted_by_user_id', 'locked_at']);
        });

        Schema::table('leads', function (Blueprint $table) {
            $table->dropForeign(['closed_by']);
            $table->dropColumn(['status', 'closed_at', 'closed_by']);
        });
    }
};
