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
        Payment::pay($request, $id);

        return redirect()->back();
    }

    public function daily($str){
        $payments = Payment::getDaily();

        return view('payment.index', ['payments' => $payments]);
    }

    public function expired($str){
        $payments = Payment::getDebts();
        //dd(Payment::where([['payment_method', '=', false],['payment_date', '<=', date('Y-m-d', time())]])->toSql());
        return view('payment.index', ['payments' => $payments]);
    }

    public function income($type = '', Request $request){
        if($type == 'today' && $request->method() == 'GET'){
            $payments = Payment::getCalculation(
                [
                    'start' => date('Y-m-d'),
                    'end' => date('Y-m-d')
                ],
                true
            );
        } elseif ($type == 'this_month' && $request->method() == 'GET'){
            $payments = Payment::getCalculation(
                [
                    'start' => date('Y-m-01'),
                    'end' => date('Y-m-d')
                ],
                true
            );
        } elseif ($request->method() == 'POST'){
            $payments = Payment::getCalculation(
                [
                    'start' => $request->input('start'),
                    'end' => $request->input('end')
                ],
                true
            );
        }


        return view('payment.filtered', ['payments' => $payments['detailed'], 'info' => $payments['info']]);
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
