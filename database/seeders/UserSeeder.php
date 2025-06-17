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
        $pelanggan = User::firstOrCreate(
            ['email' => 'pelanggan@gmail.com'],
            [
                'name' => 'pelanggan',
                'password' => Hash::make('12345678'),
            ]
        );
        $pelanggan->assignRole('pelanggan');

        // pengepul
        $pengepul = User::firstOrCreate(
            ['email' => 'pengepul@gmail.com'],
            [
                'name' => 'pengepul',
                'password' => Hash::make('12345678'),
            ]
        );
        $pengepul->assignRole('pengepul');
    }
}
