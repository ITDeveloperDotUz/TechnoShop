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

    public static function getDebts(){
        return Payment::where([['payment_method', null],['payment_date', '<=', date('Y-m-d', time())]])
            ->orWhere([['payment_method', '0'],['payment_date', '<=', date('Y-m-d', time())]])
            ->paginate(15);
    }

    public static function getDaily(){
        return Payment::where('payment_date',date('Y-m-d', time()))->paginate(15);
    }
}