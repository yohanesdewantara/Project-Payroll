<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_perusahaan', function (Blueprint $table) {
            $table->id();

            $table->string('nama_user', 255)->nullable(false);
            $table->string('jabatan', 255)->nullable();
            $table->string('alamat', 125)->nullable();
            $table->decimal('gaji', 15, 2)->nullable(false);
            $table->string('norek_user', 50)->nullable();

            // Kolom created_at dan updated_at dengan default nilai sesuai SQL
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_perusahaans');
    }
};
