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
        Schema::create('team_discounts', function (Blueprint $table) {
            $table->id();
            $table->string('m_id')->nullable()->comment('MONGO_DATA');
            $table->foreignId('team_id')->references('id')->on('teams')->cascadeOnDelete();
            $table->foreignId('camp_id')->references('id')->on('camps')->cascadeOnDelete();
            $table->decimal('price', 8, 2)->default(0);
            $table->string('m_camp_id')->comment('MONGO_DATA');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_discounts');
    }
};
