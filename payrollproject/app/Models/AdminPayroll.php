<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class AdminPayroll extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin_payroll';
    protected $primaryKey = 'id_adminpayroll';
    protected $fillable = ['username', 'password'];
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($admin_payroll) {
            if ($admin_payroll->password) {
                $admin_payroll->password = bcrypt($admin_payroll->password);
            }
        });
    }
}
