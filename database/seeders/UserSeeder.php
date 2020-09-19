<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'nik' => 154354,
            'name' => 'Komaruddin',
            'divisi' => 'IT',
            'jabatan' => 'Staff',
            'lokasi' => 'LOC Ged. Merah Lt. C',
            'telepon' => '087782327262',
            'email' => 'komarudin@outlook.com',
            'password' => Hash::make('Omiex@123'),
            'role' => 'admin',
        ]);
    }
}
