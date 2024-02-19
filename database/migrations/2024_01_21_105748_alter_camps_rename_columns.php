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
            $table->renameColumn('select_payment', 'payment_pay_type');
            $table->renameColumn('installments', 'installment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('camps', function (Blueprint $table) {
            $table->renameColumn('payment_pay_type', 'select_payment');
            $table->renameColumn('installment', 'installments');
        });
    }
};
