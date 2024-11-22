<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminPayroll;

class AdminPayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin_payroll = AdminPayroll::find(121);  // Cari admin dengan id 121
        $admin_payroll->password = bcrypt('adminpayroll');  // Enkripsi password dengan bcrypt
        $admin_payroll->save();  // Simpan perubahan ke database
    }
}
