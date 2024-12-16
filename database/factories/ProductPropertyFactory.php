<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductProperty;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use Exception;

/**
 * @extends Factory<ProductProperty>
 */
class ProductPropertyFactory extends Factory
{
    protected $model = ProductProperty::class;

    /**
     * @throws Exception
     */
    public function definition(): array
    {
        $values = [
            'Тип двигателя' => ['бензин', 'дизель', 'электро'],
            'Привод' => ['задний', 'передний', 'полный'],
            'Коробка передач' => ['механика', 'автомат'],
            'Объем двигателя' => ['1.6', '2.0', '3.0', '4.0'],
            'Расход топлива' => ['5', '7', '10', '15'],
            'Цвет' => ['красный', 'синий', 'черный', 'белый'],
            'Пробег' => ['10000', '50000', '100000', '150000'],
            'Кузов' => ['седан', 'хэтчбек', 'универсал', 'внедорожник'],
        ];

        $propertyId = $this->faker->randomElement(Property::query()->pluck('id')->toArray());
        $property = Property::query()->find($propertyId);

        if (!$property || !isset($values[$property->name])) {
            throw new Exception("Undefined or invalid property name: " . ($property->name ?? 'NULL'));
        }

        return [
            'product_id' => $this->faker->randomElement(Product::query()->pluck('id')->toArray()),
            'property_id' => $property->id,
            'value' => $this->faker->randomElement($values[$property->name]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}



