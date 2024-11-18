<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = ['username', 'password'];
    public $timestamps = false;

    // Enkripsi password saat menyimpannya
    public static function boot()
    {
        parent::boot();

        static::creating(function ($admin) {
            if ($admin->password) {
                $admin->password = bcrypt($admin->password);
            }
        });
    }
}

