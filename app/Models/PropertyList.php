<?php

namespace App\Models;

use App\Models\Traits\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PropertyList extends Model
{
    use HasFilter;
    protected $fillable = [
        'property_id',
        'value',
    ];

    protected $table = 'properties_list';

    public function properties(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

}
