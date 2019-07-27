<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Category;
use App\Product;
use App\Setting;
use App\Order;
use App\Payment;
use App\ProdIn;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::count();
        $payments = Payment::count();
        $prodIns = ProdIn::count();
        $clients = Client::count();
        $products = Product::count();
        $categories = Category::count();

        $debts = Payment::getDebts();
        $dailyPayment = Payment::getDaily();
        $dailyIncome = Payment::getDailyIncome();

        return view('home', [
            'clients' => $clients,
            'categories' => $categories,
            'products' => $products,
            'orders' => $orders,
            'payments' => $payments,
            'prodIns' => $prodIns,
            'debts' => $debts,
            'dailyPayment' => $dailyPayment,
            'dailyIncome' => $dailyIncome,
        ]);
    }
}
