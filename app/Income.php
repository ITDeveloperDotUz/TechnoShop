<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    public $fillable = [
        'type',
        'title',
        'amount',
        'note',
        'params',
        'method',
        'date',
    ];
}
