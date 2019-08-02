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
    public function index(){

        $orders = Order::count();
        $payments = Payment::count();
        $prodIns = ProdIn::count();
        $clients = Client::count();
        $products = Product::count();
        $categories = Category::count();

        $debts = Payment::getDebts();
        $dailyPayment = Payment::getDaily();
        $dailyIncome = Payment::getDailyIncome();
        $todayIncome = Payment::getCalculation(['start'=>date('Y-m-d'), 'end' =>date('Y-m-d')]);
        $thisMonthIncome = Payment::getCalculation(['start'=>date('Y-m-01'), 'end' =>date('Y-m-d')]);

        return view('home', compact([
            'clients',
            'categories',
            'products',
            'orders',
            'payments',
            'prodIns',
            'debts',
            'dailyPayment',
            'dailyIncome',
            'todayIncome',
            'thisMonthIncome'
        ]));
    }
}
