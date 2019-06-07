<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category',
        'details',
        'real_cost',
        'available',
        'price',
        'total_cost',
        'total_price',
        'profit',
        'image'];
}
