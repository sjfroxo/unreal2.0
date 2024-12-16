<?php

namespace App\Filters;

use App\Models\Property;
use App\Models\Traits\HasJoin;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PropertiesFilter extends Filter
{
    use HasJoin;

    private array $data = [];

    private function applyPropertyFilter(string $propertyName, $value): void
    {
        if (!empty($value)) {
            $propertyIds = Property::query()
                ->select('id')
                ->where('name', $propertyName)
                ->pluck('id')
                ->toArray();

//            $this->hasJoin($this->builder, 'product_properties')
//                ? $this->builder->whereIn('product_properties.property_id', $propertyIds)
//                    ->where('product_properties.value', '=', $value)
//                : $this->builder->join('product_properties', 'properties.id', '=', 'product_properties.property_id')
//                    ->whereIn('product_properties.property_id', $propertyIds)
//                    ->where('product_properties.value', '=', $value);
            $this->builder->whereRelation('properties', fn ($query) =>
                $query->whereIn('product_properties.property_id', $propertyIds)->where('product_properties.value', $value)
            );
        }
    }

    public function carBody($value): void
    {
        $this->applyPropertyFilter('Кузов', $value);
    }

    public function typeOfEngine($value): void
    {
        $this->applyPropertyFilter('Тип двигателя', $value);
    }

    public function typeOfDrive($value): void
    {
        $this->applyPropertyFilter('Привод', $value);
    }

    public function typeOfTransmission($value): void
    {
        $this->applyPropertyFilter('Коробка передач', $value);
    }

    public function engineCapacities($value): void
    {
        $this->applyPropertyFilter('Объем двигателя', $value);
    }

    public function fuelConsumptions($value): void
    {
        $this->applyPropertyFilter('Расход топлива', $value);
    }

    public function carsColor($value): void
    {
        $this->applyPropertyFilter('Цвет', $value);
    }
}
