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
        Schema::create('camps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->references('id')->on('clubs')->cascadeOnDelete();
            $table->string('m_id')->nullable()->comment('MONGO_DATA');
            $table->string('name');
            $table->decimal('price', 8,2);
            $table->string('type');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('payment_type');
            $table->string('select_payment')->nullable();
            $table->smallInteger('installments')->nullable()->comment('When the payment type is specified as "Fixed" and the selection includes the "installments" option.');
            $table->boolean('is_visible')->default(false);
            $table->boolean('is_removed')->default(false);
            $table->boolean('include_due_amount')->default(false);
            $table->decimal('processing_fee_credit_card', 5,2)->nullable();
            $table->decimal('net_amount_credit_card', 5,2)->nullable();
            $table->decimal('total_price_credit_card', 5,2)->nullable();
            $table->decimal('processing_bank_account', 5,2)->nullable();
            $table->decimal('net_amount_bank_account', 5,2)->nullable();
            $table->decimal('total_price_bank_account', 5,2)->nullable();
            $table->mediumInteger('registrations')->default(0)->nullable();
            $table->smallInteger('pending')->nullable();
            $table->decimal('paid', 10, 2)->nullable()->default(0);
            $table->decimal('invoiced', 10, 2)->nullable()->default(0);
            $table->string('got_sport_event_id')->nullable();
            $table->string('m_club_id')->nullable()->comment('MONGO_DATA');
            $table->text('m_teams')->nullable()->comment('MONGO_DATA');
            $table->text('m_installment_dates')->nullable()->comment('MONGO_DATA');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camps');
    }
};
