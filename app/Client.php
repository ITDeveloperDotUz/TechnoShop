<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $fillable = [
        'full_name',
        'phone',
        'address',
        'pass_sn',
        'pass_gd',
        'pass_gs'
    ];

    public function payment(){
        return $this->hssMany('App\Payment');
    }

    public function order(){
        return $this->hssMany('App\Order');
    }
}
