<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserPerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $data = [];

        // Membuat 50 data dummy
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'nama_user' => $faker->name,
                'jabatan' => $faker->jobTitle,
                'alamat' => $faker->address,
                'gaji' => $faker->numberBetween(5000000, 30000000), // Gaji antara 5 juta - 30 juta
                'norek_user' => $faker->bankAccountNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('user_perusahaan')->insert($data);
    }
}
