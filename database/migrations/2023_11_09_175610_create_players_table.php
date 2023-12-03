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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('m_id')->nullable()->comment('MONGO_DATA');
            $table->foreignId('club_id')->references('id')->on('clubs')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('guardian_id')->references('id')->on('guardians')->cascadeOnDelete();
            $table->date('birth_date');
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->boolean('medical_information_release_HIPPA')->default(false);
            $table->boolean('consent_for_treatment')->default(false);
            $table->boolean('acceptance_of_risk')->default(false);
            $table->boolean('refund_policy')->default(false);
            $table->boolean('delinquent_payment_policy')->default(false);
            $table->boolean('concussion_information_sheet')->default(false);
            $table->boolean('concussion_information_acknowledgement')->default(false);
            $table->boolean('appearance_agreement')->default(false);
            $table->mediumText('m_parent_ids')->nullable()->comment('MONGO_DATA');
            $table->string('m_parent_id')->nullable()->comment('MONGO_DATA');
            $table->string('m_club_id')->nullable()->comment('MONGO_DATA');
            $table->string('m_club_name')->nullable()->comment('MONGO_DATA');
            $table->string('m_username')->nullable()->comment('MONGO_DATA');
            $table->mediumText('m_teams')->nullable()->comment('MONGO_DATA');
            $table->mediumText('m_files')->nullable()->comment('MONGO_DATA');
            $table->mediumText('m_camps')->nullable()->comment('MONGO_DATA');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
