<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'type',
        'subject',
        'file',
        'privacy_agreed',
        'rating',
        'comment',
        'created_at',
    ];
}
