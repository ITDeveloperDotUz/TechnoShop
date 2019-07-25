@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif


    <div class="">
        <div class="align-center grids-2">
            <div class="four-grid">
                <a href="{{ route('clients.index') }}">
                    <div class="four-grid1 bg-green-o">
                        <div class="icon">
                            <i class=" fa fa-user bg-green" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                            <h3>Мижозлар</h3>
                            <h4>{{ $clients }}</h4>
                        </div>
                        <a class="bg-green" href="{{ route('clients.create') }}"><i class="fa fa-plus"></i></a>
                    </div>
                </a>
            </div>
            <div class="four-grid">
                <a href="{{ route('categories.index') }}">
                    <div class="four-grid2 bg-purple-o">
                        <div class="icon">
                            <i class="fa fa-align-justify bg-purple" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                            <h3>Булимлар</h3>
                            <h4>{{ $categories }}</h4>
                        </div>
                        <a class="bg-purple" href="{{ route('categories.create') }}"><i class="fa fa-plus"></i></a>
                    </div>
                </a>
            </div>
            <div class="four-grid">
                <a href="{{ route('products.index') }}">
                    <div class="four-grid3 bg-orange-o">
                        <div class="icon">
                            <i class="fa fa-box bg-orange" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                            <h3>Махсулот турлари</h3>
                            <h4>{{ $products }}</h4>
                        </div>
                        <a class="bg-orange" href="{{ route('products.create') }}"><i class="fa fa-plus"></i></a>
                    </div>
                </a>
            </div>
            <div class="four-grid">
                <a href="{{ route('product_incomes.index') }}">
                    <div class="four-grid4 bg-blue-o">
                        <div class="icon">
                            <i class="fa fa-edit bg-blue" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                            <h3>Махсулотлар</h3>
                            <h4>{{ $prodIns }}</h4>
                        </div>
                        <a class="bg-blue" href="{{ route('product_incomes.create') }}"><i class="fa fa-plus"></i></a>
                    </div>
                </a>
            </div>
            <div class="four-grid">
                <a href="{{ route('orders.index') }}">
                    <div class="four-grid4 bg-danger-o">
                        <div class="icon">
                            <i class="bg-danger fa fa-shopping-cart shopping-cart" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                            <h3>Буюртмалар</h3>
                            <h4>{{ $orders }}</h4>
                        </div>
                        <a class="bg-danger" href="{{ route('orders.create') }}"><i class=" fa fa-plus"></i></a>
                    </div>
                </a>
            </div>
            <div class="four-grid">
                <a href="{{ route('payments.index') }}">
                    <div class="four-grid4 bg-yellow-o">
                        <div class="icon">
                            <i class="bg-yellow fa fa-money-check" aria-hidden="true"></i>
                        </div>
                        <div class="four-text">
                            <h3>Туловлар</h3>
                            <h4>{{ $orders }}</h4>
                        </div>
                        <a class="bg-yellow" href="{{ route('payments.create') }}"><i class="fa fa-plus"></i></a>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
