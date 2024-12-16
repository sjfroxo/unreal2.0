<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HigherOrderTapProxy;

trait HasJoin
{
    /**
     * @param Builder $query
     * @param $table
     * @return HigherOrderTapProxy|array|null
     */
    public function hasJoin(Builder $query, $table): HigherOrderTapProxy|array|null
    {
        dump($query->getQuery()->joins);
        return tap(
            $query->getQuery()->joins,
            fn ($joins) => !empty($joins) && collect($joins)->where(fn($join) => $join->table === $table)->isNotEmpty()
        );
    }
}
