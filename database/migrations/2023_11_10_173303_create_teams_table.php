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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->references('id')->on('clubs')->cascadeOnDelete();
            $table->string('m_id')->nullable()->comment('MONGO_DATA');
            $table->foreignId('activity_id')->references('id')->on('activities')->cascadeOnDelete();
            $table->string('name', 100);
            $table->string('gender', 100)->nullable();
            $table->string('activity', 100)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->mediumText('discount_amounts')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('show_team')->default(false);
            $table->boolean('is_visible')->default(false);
            $table->boolean('is_archived')->default(false);
            $table->boolean('is_removed')->default(false);
            $table->string('m_club_id')->nullable()->comment('MONGO_DATA');
            $table->text('m_players_ids')->nullable()->comment('MONGO_DATA');
            $table->text('m_staff_member_ids')->nullable()->comment('MONGO_DATA');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
