<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder for products
        $products = [
            [
                'category_id' => 1,
                'name' => 'Product 1',
                'description' => 'Description for product 1',
                'sale_price' => 1000,
                'purchase_price' => 1000,
                'stock' => 10,
                'unit' => 'kilogram',
            ],
            [
                'category_id' => 1,
                'name' => 'Product 2',
                'description' => 'Description for product 2',
                'sale_price' => 1000,
                'purchase_price' => 1000,
                'stock' => 20,
                'unit' => 'kilogram',
            ],
            [
                'category_id' => 2,
                'name' => 'Product 3',
                'description' => 'Description for product 3',
                'sale_price' => 1000,
                'purchase_price' => 1000,
                'stock' => 30,
                'unit' => 'kilogram',
            ],
            [
                'category_id' => 2,
                'name' => 'Product 4',
                'description' => 'Description for product 4',
                'sale_price' => 1000,
                'purchase_price' => 1000,
                'stock' => 40,
                'unit' => 'kilogram',
            ],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
