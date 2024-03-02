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
        Schema::table('camp_team', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->tinyInteger('active')->default(1)->after('team_id');
            $table->date('joining_date')->nullable()->after('active');
            $table->date('leaving_date')->nullable()->after('joining_date');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('camp_team', function (Blueprint $table) {
            $table->dropColumn([
                'active',
                'joining_date',
                'leaving_date',
            ]);
        });
    }
};
