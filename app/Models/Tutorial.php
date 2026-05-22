<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $fillable = [
        'title',
        'link',
        'link_tagakaulo',
        'link_bagobo',
        'image',
        'description',
        'category',
        'difficulty',
    ];
}
