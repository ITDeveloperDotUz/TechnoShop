<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $total_cost = 0;
    public $total_price = 0;
    public $quantity = 0;
    public $profit = 0;

    protected $fillable = ['name','description','details'];

    public function product(){
        return $this->hasMany('App\Product');
    }

    public function calculate(){
        foreach ($this->product as $key => $pr){
            $this->quantity += $pr->available;
            $this->total_cost += $pr->total_cost;
            $this->total_price += $pr->total_price;
            $this->profit += $pr->profit;
        }
    }
}
