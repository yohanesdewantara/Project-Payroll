<?php

// app/Models/LogPayroll.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogPayroll extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Tentukan nama tabel jika berbeda dengan nama model (opsional)
    protected $table = 'log_payroll';

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'id_user',
        'id_perusahaan',
        'amount',
        'status',
    ];

    // Relasi dengan model UserPerusahaan
    public function user()
    {
        return $this->belongsTo(UserPerusahaan::class, 'id_user');
    }

    // Relasi dengan model Perusahaan
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }

    // Menampilkan informasi yang lebih jelas di log
    public function getStatusAttribute($value)
    {
        return ucfirst(strtolower($value)); // Mengubah status menjadi format huruf kapital pertama
    }
}
