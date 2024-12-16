<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Property;
use App\Models\ProductProperty;
use Exception;
use Illuminate\Database\Seeder;

class ProductPropertySeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run(): void
    {
        $products = Product::all();
        $properties = Property::all();

        if ($products->isEmpty() || $properties->isEmpty()) {
            throw new Exception("No products or properties found in the database.");
        }

        foreach ($products as $product) {
            foreach ($properties as $property) {
                ProductProperty::factory()
                    ->state([
                        'product_id' => $product->id,
                        'property_id' => $property->id,
                    ])
                    ->create();
            }
        }
    }
}

