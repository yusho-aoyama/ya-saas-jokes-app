<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'joke_id',
        'user_id',
        'vote',
    ];

    //
}
