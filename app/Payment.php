<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Income;

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

    public static function pay($request, $id){

        $payment = Payment::where('id',$id)->first();
        $order = $payment->order;
        $today = date('Y-m-d', time());


        $payment->payment_method = $request->input('payment_method');
        $payment->type = $request->input('payment_type');
        $payment->payment_date = $request->input('payment_date');
        $payment->note = $request->input('note');
        if(Income::where([['date', $payment->payment_date],['type', '!=', 0]])->count()){
            $income = Income::where([['date', $payment->payment_date],['type', '!=', 0]])->get();
        } else {
            $income = new Income;
        }
        $income->type = 1;
        $income->amount += (integer) $payment->payment_amount;
        $income->title = $payment->payment_method;
        $income->method = $payment->payment_method;
        $income->date = $payment->payment_date;

        $order->paid_payment += $payment->payment_amount;
        $order->remaining_payment -= $payment->payment_amount;

        $income->save();
        $payment->save();
        $order->save();

        return true;
    }

    public static function getDebts(){
        return Payment::where([['payment_method', null],['payment_date', '<=', date('Y-m-d', time())]])
            ->orWhere([['payment_method', '0'],['payment_date', '<=', date('Y-m-d', time())]])
            ->paginate(15);
    }

    public static function getDaily(){
        return Payment::where('payment_date',date('Y-m-d', time()))->paginate(15);
    }

    public static function getDailyIncome(){
        return Payment::where([['payment_method', '=', false],['payment_date', '=', date('Y-m-d', time())]])
            ->paginate(15);
    }
}

