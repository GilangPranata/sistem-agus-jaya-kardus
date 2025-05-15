<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('12345678'),
            ]
        );
        $admin->assignRole('admin');

        // Pegawai
        $pegawai = User::firstOrCreate(
            ['email' => 'pegawai@gmail.com'],
            [
                'name' => 'pegawai',
                'password' => Hash::make('12345678'),
            ]
        );
        $pegawai->assignRole('pegawai');
    }
}
