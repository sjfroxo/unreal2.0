<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, HasFilter;
    protected $fillable = [
        'name',
        'price',
        'mileage'
    ];

    protected $table = 'products';

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'product_properties', 'product_id', 'property_id')
            ->withPivot('value');
    }
}
