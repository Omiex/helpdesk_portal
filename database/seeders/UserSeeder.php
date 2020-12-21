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
            'nik' => 123456,
            'name' => 'Admin',
            'divisi' => '',
            'jabatan' => '',
            'lokasi' => '',
            'telepon' => '',
            'email' => '',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);
    }
}
