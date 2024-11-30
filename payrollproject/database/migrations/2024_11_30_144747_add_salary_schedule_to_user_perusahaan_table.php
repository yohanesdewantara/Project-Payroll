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
            $table->date('jadwal_gaji_tanggal')->nullable();
            $table->time('jadwal_gaji_jam')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_perusahaan', function (Blueprint $table) {
            $table->dropColumn(['jadwal_gaji_tanggal', 'jadwal_gaji_jam']);
        });
    }
};
