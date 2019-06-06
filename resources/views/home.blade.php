@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="four-grids">
                <div class="col-md-3 four-grid">
                    <a href="{{ route('clients.index') }}">
                        <div class="four-grid1">
                            <div class="icon">
                                <i class=" fa fa-user user" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3>Мижозлар</h3>
                                <h4>{{ $clients }}</h4>
                            </div>
                            <a href="{{ route('clients.create') }}"><i class="fa fa-plus"></i></a>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 four-grid">
                    <a href="{{ route('categories.index') }}">
                        <div class="four-grid2">
                            <div class="icon">
                                <i class="fa fa-align-justify align-justify " aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3>Булимлар</h3>
                                <h4>{{ $categories }}</h4>
                            </div>
                            <a href="{{ route('categories.create') }}"><i class="fa fa-plus"></i></a>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 four-grid">
                    <a href="{{ route('products.index') }}">
                        <div class="four-grid3">
                            <div class="icon">
                                <i class="fa fa-box bell" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3>Махсулотлар</h3>
                                <h4>{{ $products }}</h4>
                            </div>
                            <a href="{{ route('products.create') }}"><i class="fa fa-plus"></i></a>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 four-grid">
                    <a href="{{ route('product_incomes.index') }}">
                        <div class="four-grid4">
                            <div class="icon">
                                <i class="fa fa-shopping-cart shopping-cart" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3>Киримлар</h3>
                                <h4>26</h4>
                            </div>
                        <a href="{{ route('product_incomes.create') }}"><i class="fa fa-plus"></i></a>
                        </div>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
@endsection
