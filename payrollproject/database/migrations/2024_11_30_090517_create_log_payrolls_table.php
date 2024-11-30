<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 // database/migrations/YYYY_MM_DD_create_log_payrolls_table.php
public function up()
{
    Schema::create('log_payrolls', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_user')->constrained('user_perusahaan');
        $table->foreignId('id_perusahaan')->constrained('perusahaans');
        $table->decimal('amount', 15, 2);  // Gaji yang dibayar
        $table->enum('status', ['SUCCESS', 'FAILED']);  // Status pembayaran
        $table->timestamps();  // Menyimpan waktu transaksi
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_payrolls');
    }
};
