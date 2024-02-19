<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('camps', function (Blueprint $table) {
            $table->decimal('processing_fee_using_credit_card', 10,2)->nullable()->default(0)->change();
            $table->decimal('net_amount_using_credit_card', 10,2)->nullable()->default(0)->change();
            $table->decimal('total_price_using_credit_card', 10,2)->nullable()->default(0)->change();
            $table->decimal('processing_fee_using_bank_account', 10,2)->nullable()->default(0)->change();
            $table->decimal('net_amount_using_bank_account', 10,2)->nullable()->default(0)->change();
            $table->decimal('total_price_using_bank_account', 10,2)->nullable()->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('camps', function (Blueprint $table) {
            $table->decimal('processing_fee_using_credit_card', 5,2)->change();
            $table->decimal('net_amount_using_credit_card', 5,2)->change();
            $table->decimal('total_price_using_credit_card', 5,2)->change();
            $table->decimal('processing_fee_using_bank_account', 5,2)->change();
            $table->decimal('net_amount_using_bank_account', 5,2)->change();
            $table->decimal('total_price_using_bank_account', 5,2)->change();
        });
    }
};
