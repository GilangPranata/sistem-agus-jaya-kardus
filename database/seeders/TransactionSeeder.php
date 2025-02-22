<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('transactions')->insert([
            [
                'invoice' => 'INV-1001',
                'product_id' => 1, // Make sure this product exists
                'qty' => 2,
                'price' => 50000,
                'customer_id' => 1, // Make sure this customer exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice' => 'INV-1002',
                'product_id' => 2, // Make sure this product exists
                'qty' => 1,
                'price' => 75000,
                'customer_id' => 2, // Make sure this customer exists
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

    }
}
