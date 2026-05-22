<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndigenousKnowledge extends Model
{
    protected $fillable = [
        'healer_id',
        'practice_name',
        'cultural_significance',
        'description',
    ];
}
