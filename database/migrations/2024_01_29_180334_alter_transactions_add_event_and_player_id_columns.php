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
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreignId('camp_id')->nullable()->after('id')->constrained()->nullOnDelete();
            $table->foreignId('player_id')->nullable()->after('camp_id')->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['camp_id']);
            $table->dropForeign(['player_id']);

            $table->dropColumn('camp_id');
            $table->dropColumn('player_id');
        });
    }
};
