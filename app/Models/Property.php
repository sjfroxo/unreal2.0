<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Property extends Model
{
    use HasFactory, HasFilter, Searchable;
    protected $fillable = [
        'name',
        'slug',
        'type',
    ];

    protected $table = 'properties';

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_properties', 'property_id', 'product_id')
            ->withPivot('value');
    }

    public function propertiesList(): HasMany
    {
        return $this->hasMany(PropertyList::class, 'property_id');
    }
}
