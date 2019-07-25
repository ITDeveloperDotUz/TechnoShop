<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Order;
use App\Client;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::paginate(15);
        return view('payment.index', ['payments' => $payments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function GetByOrder($id){
        return redirect(route('home'));
    }

    public function pay(Request $request, $id){
        $payment = Payment::where('id',$id)->first();
        $order = $payment->order;

        $payment->payment_method = $request->input('payment_method');
        $payment->type = $request->input('payment_type');
        $payment->payment_date = $request->input('payment_date');
        $payment->note = $request->input('note');

        $order->paid_payment += $payment->payment_amount;
        $order->remaining_payment -= $payment->payment_amount;

        $payment->save();
        $order->save();

        return redirect()->back();
    }

    public function daily($str){
        $payments = Payment::where('payment_date',date('Y-m-d', time()))->paginate(15);

        return view('payment.index', ['payments' => $payments]);
    }

    public function expired($str){
        $payments = Payment::where([['payment_method', null],['payment_date', '<=', date('Y-m-d', time())]])
            ->orWhere([['payment_method', '0'],['payment_date', '<=', date('Y-m-d', time())]])
            ->paginate(15);
        //dd(Payment::where([['payment_method', '=', false],['payment_date', '<=', date('Y-m-d', time())]])->toSql());
        return view('payment.index', ['payments' => $payments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
