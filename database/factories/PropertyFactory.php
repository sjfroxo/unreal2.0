<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Property>
 */
class PropertyFactory extends Factory
{
    private static array $properties = [
        'Кузов',
        'Тип двигателя',
        'Привод',
        'Коробка передач',
        'Объем двигателя',
        'Расход топлива',
        'Цвет',
        'Пробег',
    ];

    private static int $currentIndex = 0;
    public function definition(): array
    {
        $name = self::$properties[self::$currentIndex];

        self::$currentIndex++;

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'type' => 'line',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
