<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'hall_id', 'user_id', 'seat_id',
    ];
}
