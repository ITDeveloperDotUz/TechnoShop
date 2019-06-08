<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\ProdIn;

class ProdInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prods = Product::all();
        $cats = Category::all();

        foreach ($cats as $key => $cat){
            $cat->calculate();
            if(!$cat->quantity){
                $cats->forget($key);
            }
        }
        return view('prodIn.index', [
            'prods' => $prods,
            'cats' => $cats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();

        return view('prodIn.create', ['cats' => json_encode($cats)]);
    }

    public function getbycategory($id){
        $products = Product::where('category_id', $id)->get();
        return json_encode($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pdata = json_decode($request->input('product_data'));
        $products = Product::all();
        foreach ($pdata as $pdatum) {
            foreach ($pdatum->fields as $field) {
                $pr = $products->where('id', $field->id)->first();
                if($pr->available){
                    $field->available += $pr->available;
                    $field->total_cost = $pr->available * $field->real_cost;
                    $field->total_price = $pr->available * $field->price;
                    $field->profit = $field->total_price - $field->total_cost;
                    $pr->fill((array) $field)->save();
                } else {
                    $pr->fill((array) $field)->save();
                }
            }
        }
        $prodIn = new ProdIn();
        $prodIn->fill($request->input());
        $prodIn->save();
        return redirect(route('home'));
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
