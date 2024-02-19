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
        Schema::dropIfExists('transactions');

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('camp_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('player_id')->nullable()->constrained()->nullOnDelete();
            $table->string('customer_email')->nullable();
            $table->text('description')->nullable();
            $table->string('event_name')->nullable();
            $table->dateTime('created_date')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('status')->nullable();
            $table->string('invoice_number')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('currency')->nullable();
            $table->decimal('fee', 15, 2)->nullable();
            $table->boolean('is_link')->nullable();
            $table->string('mode')->nullable();
            $table->string('payment_intent_id')->nullable();
            $table->string('statement_descriptor')->nullable();
            $table->string('customer_description')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('application_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
