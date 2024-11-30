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
        Schema::create('jadwal_gaji', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Menggunakan user_id untuk mengaitkan jadwal dengan karyawan
            $table->date('tgl_gaji');
            $table->time('jam_gaji');
            $table->timestamps();

            // Menambahkan foreign key constraint, yang menghubungkan user_id ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_gaji');
    }
};
