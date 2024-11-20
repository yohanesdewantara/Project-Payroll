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
        Schema::table('user_perusahaan', function (Blueprint $table) {
            $table->unique(['alamat', 'norek_user'], 'unique_bank_norek');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_perusahaan', function (Blueprint $table) {
            $table->dropUnique('unique_bank_norek');
        });
    }
};
