<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalGaji extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal_gaji',
        'jam_gaji',
        'user_id',
    ];


    protected $table = 'jadwal_gaji'; //
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan');
    }

    public function userPerusahaan()
    {
        // return $this->belongsTo(UserPerusahaan::class, 'id_perusahaan', 'id_perusahaan');
        return $this->belongsTo(UserPerusahaan::class, 'user_id', 'id_user');
    }

}
