<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RequestOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('request_orders')->insert([
            [
                'collector_id' => 1,
                'product_id' => 1, // Make sure this product exists
                'quantity' => 2,
               
            ],
            [
              'collector_id' => 2,
                'product_id' => 2, // Make sure this product exists
                'quantity' => 2,
               
            ]
        ]);
    }
}
