<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Healer extends Model
{
    protected $fillable = [
        'healer_name',
        'ethnic_group',
        'phone',
        'location',
        'latitude',
        'longitude',
        'specialization',
        'experience_years',
        'languages',
        'about',
        'image',
    ];

    public function plants()
    {
        return $this->belongsToMany(\App\Models\Plant::class, 'healer_plant_relations', 'healer_id', 'plant_id');
    }
}
