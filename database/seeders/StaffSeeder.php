<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        DB::table('staff')->insert([
            [
                'name' => 'John Doe',
                'address' => '123 Main Street, City',
                'join_date' => Carbon::now()->subYears(2)->format('Y-m-d'),
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'address' => '456 Elm Street, City',
                'join_date' => Carbon::now()->subYears(1)->format('Y-m-d'),
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('securepass456'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
