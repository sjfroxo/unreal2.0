<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $totalRecords = 1000000;
        $batchSize = 10000;

        for ($i = 0; $i < $totalRecords; $i += $batchSize) {
            Product::factory()->count($batchSize)->create();
        }
    }
}
