<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brands = ['Toyota', 'Honda', 'Ford', 'BMW', 'Mercedes', 'Nissan', 'Hyundai', 'Kia', 'Chevrolet', 'Volkswagen'];
        $prices = [100000, 150000, 200000, 250000, 300000, 350000, 400000, 450000, 500000];

        return [
            'name' => $this->faker->randomElement($brands),
            'price' => $this->faker->randomElement($prices),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
