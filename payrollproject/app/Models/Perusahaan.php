<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    protected $primaryKey = 'id_perusahaan';

    // Jika primary key bukan auto-increment, ubah ini menjadi false
    public $incrementing = true;

    // Tentukan tipe data primary key
    protected $keyType = 'int';

    protected $fillable=[
        'nama_perusahaan',
        'alamat',
        'nohp_perusahaan',
        'norek_perusahaan',
        'saldo'


    ];

}
