<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdIn extends Model
{
    protected $fillable = ['product_data', 'total', 'tcost', 'tprice', 'profit'];
}
