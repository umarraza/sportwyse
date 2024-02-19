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
            $table->renameColumn('processing_fee_credit_card', 'processing_fee_using_credit_card');
            $table->renameColumn('net_amount_credit_card', 'net_amount_using_credit_card');
            $table->renameColumn('total_price_credit_card', 'total_price_using_credit_card');
            $table->renameColumn('processing_bank_account', 'processing_fee_using_bank_account');
            $table->renameColumn('net_amount_bank_account', 'net_amount_using_bank_account');
            $table->renameColumn('total_price_bank_account', 'total_price_using_bank_account');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('camps', function (Blueprint $table) {
            $table->renameColumn('processing_fee_using_credit_card', 'processing_fee_credit_card');
            $table->renameColumn('net_amount_using_credit_card', 'net_amount_credit_card');
            $table->renameColumn('total_price_using_credit_card', 'total_price_credit_card');
            $table->renameColumn('processing_fee_using_bank_account', 'processing_bank_account');
            $table->renameColumn('net_amount_using_bank_account', 'net_amount_bank_account');
            $table->renameColumn('total_price_using_bank_account', 'total_price_bank_account');
        });
    }
};
