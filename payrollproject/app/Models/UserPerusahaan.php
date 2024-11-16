<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPerusahaan extends Model
{
    use HasFactory;
    protected $table = 'user_perusahaan';
    protected $primaryKey = 'id_user';

    // Jika primary key bukan auto-increment, ubah ini menjadi false
    public $incrementing = true;

    // Tentukan tipe data primary key
    protected $keyType = 'int';

    protected $fillable=[
        'nama_user',
        'jabatan',
        'alamat',
        'gaji',
        'norek_user'

    ];

}
