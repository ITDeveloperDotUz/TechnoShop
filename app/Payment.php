<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = [
        'order_id',
        'client_id',
        'client_name',
        'type',
        'contract_number',
        'payment_amount',
        'payment_method',
        'payment_date',
        'note'
    ];

    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function order(){
        return $this->belongsTo('App\Order');
    }
}
