@extends('layouts.app')

@section('content')
<div class="container">


        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="mbtm-3">
            <div class="align-center grids-2">
                <div class="four-grid">
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
                <div class="four-grid">
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
                <div class="four-grid">
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
                <div class="four-grid">
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
                <div class="four-grid">
                    <a href="{{ route('orders.index') }}">
                        <div class="four-grid4">
                            <div class="icon">
                                <i class="fa fa-shopping-cart shopping-cart" aria-hidden="true"></i>
                            </div>
                            <div class="four-text">
                                <h3>Буюртмалар</h3>
                                <h4>26</h4>
                            </div>
                            <a href="{{ route('orders.create') }}"><i class="fa fa-plus"></i></a>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="mbtm-3">
            <div class="grids-2 ">
                <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Primary Panel title</h5>
                        <p class="card-text text-white">Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
                    </div>
                </div>
                <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Secondary Panel title</h5>
                        <p class="card-text text-white">Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
                    </div>
                </div>
                <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Success Panel title</h5>
                        <p class="card-text text-white">Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
                    </div>
                </div>
                <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Danger Panel title</h5>
                        <p class="card-text text-white">Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
                    </div>
                </div>
                <div class="card text-white bg-warning mb-3" style="max-width: 20rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Warning Panel title</h5>
                        <p class="card-text text-white">Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
                    </div>
                </div>
                <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Info Panel title</h5>
                        <p class="card-text text-white">Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="mbtm-3">
            <div class="grids-2 ">

                <div class="card text-white bg-dark-o mb-3">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Dark Panel title</h5>
                        <p class="card-text">Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
                    </div>
                </div>
                <div class="card text-white bg-light-o mb-3">
                    <div class="card-header" >Header</div>
                    <div class="card-body">
                        <h5 class="card-title">Light Panel title</h5>
                        <p class="card-text">Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

</div>
@endsection
