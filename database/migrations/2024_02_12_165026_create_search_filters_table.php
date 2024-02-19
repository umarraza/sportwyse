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
        Schema::create('search_filters', function (Blueprint $table) {
            $table->id();
            $table->string('search_name', 50);
            $table->foreignId('camp_id')->references('id')->on('camps')->cascadeOnDelete();
            $table->foreignId('player_id')->references('id')->on('players')->cascadeOnDelete();
            $table->string('event_name', 50)->nullable();
            $table->string('player_name', 50)->nullable();
            $table->date('from_date');
            $table->date('to_date');
            $table->decimal('from_amount', 7, 2);
            $table->decimal('to_amount', 7, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_filters');
    }
};
