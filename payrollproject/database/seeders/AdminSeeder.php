<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = Admin::find(1);  // Cari admin dengan id 1
        $admin->password = bcrypt('admin');  // Enkripsi password dengan bcrypt
        $admin->save();  // Simpan perubahan ke database
    }
}
