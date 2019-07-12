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
        return view('order.index');
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
        //dd($request->input());
        $order = new Order;
        $order->client_id = $inp['client_id'];
        $order->client_name = $inp['client_name'];
        $order->payments = json_encode($inp['payments']);
        $order->products = json_encode($inp['products']);
        $order->calculation = json_encode($inp['calculation']);
        $order->initial_fee = json_encode($inp['initial_fee']);
        $order->paid_payment = $inp['paid_payment'];
        $order->remaining_payment = $inp['remaining_payment'];
        $order->order_date = $inp['order_date'];
        try{
            $order->save();
        } catch (\Exception $e){
            return $e->getMessage();
        }
    }

    private function saveProducts($products){

        return $products;


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
