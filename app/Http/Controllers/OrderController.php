<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session;
use App\Category;
use App\Product;
use App\ProdIn;
use App\Client;
use App\Payment;
use App\Order;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('order.create');
    }

    public function getdata($id){
        $cats = Category::all();
        $clients = Client::all();
        $products = Product::where('available', '>=', 1)->get();

        return ([
            'cats' => $cats,
            'clients' => $clients,
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inp = $request->input();
        if($inp['id'] == 0){
            $order = new Order;
            $orderType = 0;
        } else {
            $order = Order::where('id', $inp['id'])->first();
            $orderType = 1;
        }

        $order->client_id = $inp['client_id'];
        $order->client_name = $inp['client_name'];
        $order->payments = (count($inp['payments']) < 1)? 0 : json_encode($inp['payments']) ;
        $order->products = json_encode($inp['products']);
        $order->calculation = json_encode($inp['calculation']);
        $order->initial_fee = json_encode($inp['initial_fee']);
        $order->paid_payment = $inp['paid_payment'];
        $order->remaining_payment = $inp['remaining_payment'];
        $order->order_date = $inp['order_date'];

        try{
            $order->save();
        } catch (\Exception $e){
            return response()->json($e->getMessage());
        }



        $oPm = $inp['initial_fee'];
        if($oPm['initial_fee'] != 0){

            $payment = $orderType ? $order->payment->where('type', 2)->first() : new Payment;
            $payment->payment_amount = $oPm['initial_fee'];
            $payment->client_name = $inp['client_name'];
            $payment->type = $oPm['payment_type'];
            $payment->payment_date = $oPm['payment_date'];
            $payment->payment_method = $oPm['payment_method'];
            $payment->order_id = $order->id;
            $payment->client_id = $order->client_id;

            $payment->save();
        }

        if($oPm['payment_type'] == 1){
            $payment = $orderType ? $order->payment->where('type', 1)->first() : new Payment;
            $payment->payment_amount = ($order->paid_payment != 0)? $order->paid_payment : $order->remaining_payment;
            $payment->client_name = $inp['client_name'];
            $payment->type = $oPm['payment_type'];
            $payment->payment_date = $oPm['payment_date'];
            $payment->payment_method = $oPm['payment_method'];
            $payment->order_id = $order->id;
            $payment->client_id = $order->client_id;

            $payment->save();
        }

        if($payments = (count($inp['payments']) < 1)? 0 : $inp['payments']){
            Payment::where('order_id', $order->id)->delete();
            foreach($payments as $pm){
                $data = [
                    'order_id' => $order->id,
                    'client_id' => $order->client_id,
                    'type' => $pm['payment_type'],
                    'client_name' => $order->client_name,
                    'contract_number' => $order->client_id.'/'.$order->id,
                    'payment_amount' => $pm['payment_amount'],
                    'payment_date' => $pm['payment_date'],
                ];

                try{
                    Payment::create($data);
                } catch (\Exception $e){
                    return response()->json(['success' => false, 'message' => $e->getMessage()]);
                }
            }
        }


        return $order->id;
    }

    public function confirm($id, Request $request){
        $order = Order::where('id', $id)->first();
        $products = json_decode($order->products);
        $firstPayment = $order->payment->first();

        if(
            ($order->paid_payment != 0 && $firstPayment->payment_method == false) ||
            ($firstPayment->type && $firstPayment->payment_method == false)
        ){
            if($request->ajax()){
                return json_encode(['success' => false, 'message' => 'Туловни курсатиш шарт']);
            } else {
                return redirect()->back()->withErrors(['message' => 'Туловни курсатиш шарт']);
            }
        }
        foreach ($products as $product){
            $pr = Product::where('id', $product->id)->first();
            $pr->available -= $product->count;
            $pr->total_cost -= $product->total_cost;
            $pr->total_price -= $product->total_price;
            $pr->profit -= $product->profit;
            $pr->save();
        }

        $order->confirmed = true;
        $order->save();

        if($request->ajax()){
            return json_encode(['success' => false, 'message' => 'Туловни курсатиш шарт']);
        } else {
            return redirect()->back()->with('success', 'Буюртма тасдикланди');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $order = Order::where('id', $id)->first();
        $payments = $order->payment;
        $products = json_decode($order->products);

        return view('order.show', ['order' => $order, 'payments' => $payments, 'products' => $products]);
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
