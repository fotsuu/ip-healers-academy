<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'common_name',
        'scientific_name',
        'category',
        'description',
        'documented_uses',
        'preparation_methods',
        'preparation_methods_tagakaulo',
        'preparation_methods_bagobo',
        'habitat',
        'image',
    ];

    public function healers()
    {
        return $this->belongsToMany(Healer::class, 'healer_plant_relations', 'plant_id', 'healer_id');
    }
}
