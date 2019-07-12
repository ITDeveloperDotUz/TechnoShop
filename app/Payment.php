<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = [
        'order_id',
        'client_id',
        'amount',
        'method',
        'note'
    ];

    public function payment(){
        return $this->belongsTo('App\Order');
    }

    public function order(){
        return $this->belongsTo('App\Client');
    }
}
