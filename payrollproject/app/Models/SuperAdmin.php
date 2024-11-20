<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class SuperAdmin extends Authenticatable

{
    use HasFactory;


    protected $table = 'super_admin';
    protected $primaryKey = 'id_superadmin';
    protected $fillable = ['username', 'password'];
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($super_admin) {
            if ($super_admin->password) {
                $super_admin->password = bcrypt($super_admin->password);
            }
        });
    }
}
