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
        Schema::table('camps', function (Blueprint $table) {

            $table->enum('processing_fee', ['Exclude processing fees in price', 'Include processing fees in price', 'Show processing fees in line'])
                ->nullable()
                ->default('Exclude processing fees in price')
                ->after('include_due_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('camps', function (Blueprint $table) {
            $table->dropColumn('processing_fee');
        });
    }
};
