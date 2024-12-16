<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    use HasFactory, HasFilter;
    protected $fillable = [
        'product_id',
        'property_id',
        'value',
    ];

    protected $table = 'product_properties';
}
