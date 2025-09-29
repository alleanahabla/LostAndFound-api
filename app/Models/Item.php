<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'categoryID',
        'status',
        'description',
        'campus',
        'location',
        'dateLost',
        'dateFound'
    ];
}
