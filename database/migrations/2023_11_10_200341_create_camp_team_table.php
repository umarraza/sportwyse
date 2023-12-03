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
        Schema::create('camp_team', function (Blueprint $table) {
            $table->id();
            $table->foreignId('camp_id')->references('id')->on('camps')->cascadeOnDelete();
            $table->foreignId('team_id')->references('id')->on('teams')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camp_team');
    }
};
