<?php

namespace App\Filters;

class ProductsFilter extends Filter
{
    /**
     * @param $value
     * @return void
     */
    public function productName($value): void
    {
        if (!empty($value)) {
            $this->builder->where('name', $value);
        }
    }

    /**
     * @param $value
     * @return void
     */
    public function priceFrom($value): void
    {
        $value = (int)$value;
        if (!empty($value)) {
            $this->builder->where('price', '>', $value);
        }
    }

    /**
     * @param $value
     * @return void
     */
    public function priceTo($value): void
    {
        $value = (int)$value;
        if (!empty($value)) {
            $this->builder->where('price', '<', $value);
        }
    }

    /**
* @param $value
* @return void
*/
    public function mileageFrom($value): void
    {
        $value = (int)$value;
        if (!empty($value)) {
            $this->builder->where('mileage', '>', $value);
        }
    }

    /**
     * @param $value
     * @return void
     */
    public function mileageTo($value): void
    {
        $value = (int)$value;
        if (!empty($value)) {
            $this->builder->where('mileage', '<', $value);
        }
    }
}
