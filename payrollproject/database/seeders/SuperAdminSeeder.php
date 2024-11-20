<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\SuperAdmin;


class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
          //

          $super_admin = SuperAdmin::find(111);  // Cari admin dengan id 1
          $super_admin->password = bcrypt('superadmin');  // Enkripsi password dengan bcrypt
          $super_admin->save();  // Simpan perubahan ke database
    }
}
