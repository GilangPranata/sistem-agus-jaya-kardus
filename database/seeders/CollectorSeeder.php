<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CollectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('collectors')->insert([
            [
                'name' => 'Pengepul 1',
                'address' => '123 Maple Street, City',
                'phone' => '123-456-7890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pengepul 2',
                'address' => '456 Oak Avenue, City',
                'phone' => '987-654-3210',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    
    }
}
