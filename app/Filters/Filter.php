<?php

declare(strict_types=1);

namespace App\Filters;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class Filter
{
    public const KEYS_TO_BOOL = [];
    public const KEYS_TO_INT = [];
    public const KEYS_TO_DATE = [];
    public const KEYS_STRING_TO_ARRAY = [];
    public const KEYS_TO_ARRAY = [];

    protected Builder $builder;
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function setRequest(Request $request): self
    {
        $this->request = $request;
        return $this;
    }

    /**
     * Применение фильтров к запросу
     *
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->request->input() as $method => $value) {
            $methodName = Str::camel($method);

            if (null === $value) {
                continue;
            }

            if (method_exists($this, $methodName)) {
                if (in_array($method, static::KEYS_TO_BOOL, true)) {
                    $value = (bool)$value;
                }

                if (in_array($method, static::KEYS_TO_INT, true)) {
                    $value = (int)$value;
                }

                if (in_array($method, static::KEYS_TO_DATE, true)) {
                    $value = CarbonImmutable::parse($value);
                }

                if (in_array($method, static::KEYS_TO_ARRAY, true)) {
                    $value = is_array($value) ? $value : [$value];
                }

                if (in_array($method, static::KEYS_STRING_TO_ARRAY, true)) {
                    $value = explode(',', $value);
                }

                $this->{$methodName}($value);
            }
        }

//        dd($this->builder->get());
        return $this->builder;
    }
}
