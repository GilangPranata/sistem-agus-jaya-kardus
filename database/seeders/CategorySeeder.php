<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Plastik', 'description' => 'Sampah Plastik'],
            ['name' => 'Kardus', 'description' => 'Olahan Kardus'],
            ['name' => 'Kaleng', 'description' => 'Kaleng bekas'],
            ['name' => 'Kertas', 'description' => 'Kertas bekas'],
            ['name' => 'Botol', 'description' => 'Botol bekas'],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
