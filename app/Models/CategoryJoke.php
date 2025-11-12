<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryJoke extends Pivot
{
    // The requirements for the pivot table
    protected $fillable = [];
    protected $hidden = [];
    protected $casts = [];
}
