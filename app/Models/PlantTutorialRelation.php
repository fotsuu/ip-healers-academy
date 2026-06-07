<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlantTutorialRelation extends Model
{
    protected $fillable = [
        'plant_id',
        'tutorial_id',
        'notes',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function tutorial()
    {
        return $this->belongsTo(Tutorial::class);
    }
}
