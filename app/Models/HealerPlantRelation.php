<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealerPlantRelation extends Model
{
    protected $fillable = [
        'healer_id',
        'plant_id',
        'usage_desc',
        'notes',
    ];
}
