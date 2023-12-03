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
        Schema::create('camp_player', function (Blueprint $table) {
            $table->id();
            $table->foreignId('camp_id')->references('id')->on('camps')->cascadeOnDelete();
            $table->foreignId('player_id')->references('id')->on('players')->cascadeOnDelete();
            $table->boolean('membership')->default(false);
            $table->boolean('SPI_event')->default(false);
            $table->string('payment_status', 100)->nullable();
            $table->boolean('subscription')->default(false);
            $table->string('interval', 100)->nullable();
            $table->date('subscriptions_expired_at');
            $table->date('subscriptions_started_at');
            $table->decimal('price', 8, 2)->nullable()->default(0);
            $table->decimal('processing_fee', 8, 2)->nullable()->default(0);
            $table->decimal('total_price', 8, 2)->nullable()->default(0);
            $table->decimal('pending_price', 8, 2)->nullable()->default(0);
            $table->decimal('credit_amount', 8, 2)->nullable()->default(0);
            $table->decimal('due_amount', 8, 2)->nullable()->default(0);
            $table->string('m_transaction_id', 100)->nullable();
            $table->string('m_camp_id');
            $table->string('m_camp_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camp_player');
    }
};
