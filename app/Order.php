<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'client_id',
        'client_name',
        'payments',
        'products',
        'calculation',
        'initial_fee',
        'paid_payment',
        'remaining_payment',
        'order_date',
        'closed',
        'confirmed'
    ];

    public function payment(){
        return $this->hasMany('App\Payment');
    }

    public function client(){
        return $this->belongsTo('App\Client');
    }
}
