<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // seed the categories table
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
