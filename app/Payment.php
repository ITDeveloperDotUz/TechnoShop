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

    public static function pay($request, $id){

        $payment = Payment::where('id',$id)->first();
        $order = $payment->order;
        $today = date('Y-m-d', time());


        $payment->payment_method = $request->input('payment_method');
        $payment->type = $request->input('payment_type');
        $payment->payment_date = $request->input('payment_date');
        $payment->note = $request->input('note');

        $order->paid_payment += $payment->payment_amount;
        $order->remaining_payment -= $payment->payment_amount;

        $payment->save();
        $order->save();

        return true;
    }

    public static function getDebts(){
        return Payment::where([['payment_method', null],['payment_date', '<=', date('Y-m-d', time())]])
            //->orWhere([['payment_method', '0'],['payment_date', '<=', date('Y-m-d', time())]])
            ->paginate(15);
    }

    public static function getDaily(){
        return Payment::where('payment_date',date('Y-m-d', time()))->paginate(15);
    }

    public static function getDailyIncome(){
        return Payment::where([['payment_method', false],['payment_date', date('Y-m-d', time())]])->paginate(15);
    }

    public static function getCalculation($params, $datailed = false){
        $payments = (Payment::whereBetween('payment_date', [$params['start'], $params['end']])
            ->where('payment_method', false)
            ->paginate(15)
        );
        $pay_met = $payments
            ->groupBy('payment_method')
            ->toArray();
        $info = static::calculate($pay_met);
        if(!$datailed){
            return $info;
        } else {
            return ['detailed' => $payments, 'info' => $info];
        }
    }


    public static function calculate($payments){
        $data = [
            'Накд' => 0,
            'Карта утказмаси' => 0,
            'Карта оркали' => 0,
            'Банк утказмаси' => 0,
            'Жами' => 0,
            'Туловлар' => 0
        ];
        foreach ($payments as $key => $val){
            foreach($val as $innerVal){
                $data[$key] += $innerVal['payment_amount'];
                $data['Жами'] += $innerVal['payment_amount'];
                $data['Туловлар']++;
            }
        }

        return $data;
    }
}

