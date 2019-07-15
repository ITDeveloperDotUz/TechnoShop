<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        } else {
            $order = Order::where('id', $inp['id'])->first();
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

        $payments = (count($inp['payments']) < 1)? 0 : json_encode($inp['payments']) ;

        $oPm = $inp['initial_fee'];
        if($oPm['initial_fee'] != 0){
            $payment = new Payment;
            $payment->payment_amount = $oPm['initial_fee'];
            $payment->client_name = $inp['client_name'];
            $payment->type = $oPm['payment_type'];
            $payment->payment_date = $oPm['payment_date'];
            $payment->payment_method = $oPm['payment_method'];
            $payment->order_id = $order->id;
            $payment->client_id = $order->client_id;

            $payment->save();

        }

        foreach($payments as $pm){
            $data = [
                'order_id' => $id,
                'client_id' => $order->client_id,
                'client_name' => $order->client_name,
                'contract_number' => $order->client_id.'/'.$id,
                'payment_amount' => $pm->payment_amount,
                'payment_date' => $pm->payment_date,
            ];

            try{
                Payment::create($data);
            } catch (\Exception $e){
                return response()->json(['success' => false, 'message' => $e->getMessage()]);
            }
        }

        return $order->id;
    }

    public function confirm($id){
        $order = Order::where('id', $id)->first();
        $payments = json_decode($order->payments);
        $products = json_decode($order->products);


        foreach($payments as $pm){
            $data = [
                'order_id' => $id,
                'client_id' => $order->client_id,
                'client_name' => $order->client_name,
                'contract_number' => $order->client_id.'/'.$id,
                'payment_amount' => $pm->payment_amount,
                'payment_date' => $pm->payment_date,
            ];

            try{
                Payment::create($data);
            } catch (\Exception $e){
                return response()->json(['success' => false, 'message' => $e->getMessage()]);
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
        return redirect()->back();
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
