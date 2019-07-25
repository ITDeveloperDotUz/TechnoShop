
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif


    <div class="">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-3">
                        <div class="r3_counter_box p-0 green-gradient">
                            <a class="" href="{{ route('clients.create') }}">
                                <div class="stats">
                                    <i class="float-left fa fa-user dollar2 icon-rounded"></i>
                                </div>
                            </a>
                            <a class="" href="{{ route('clients.index') }}">
                                <div class="stats">
                                    <h5><strong>$452</strong></h5>
                                    <span>Total Revenue</span>
                                </div>
                                <i class="fa fa-user bg-icon"></i>
                            </a>
                        </div>

                </div>
                <div class="col-md-3">
                    <div class="r3_counter_box p-0 purple-gradient">
                        <a class="" href="{{ route('clients.create') }}">
                        <div class="stats">
                            <i class="float-left fa fa-plus dollar2 icon-rounded"></i>
                        </div>
                        </a>
                        <a class="" href="{{ route('clients.create') }}">
                        <div class="stats">
                            <h5><strong>$1019</strong></h5>
                            <span>Online Revenue</span>
                        </div>
                        <i class="fa fa-bars bg-icon"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="r3_counter_box p-0 orange-gradient">
                        <a class="" href="{{ route('clients.create') }}">
                        <div class="stats">
                            <i class="float-left fa fa-plus dollar2 icon-rounded"></i>
                        </div>
                        </a>
                        <a class="" href="{{ route('clients.create') }}">
                        <div class="stats">
                            <h5><strong>$1012</strong></h5>
                            <span>Expenses</span>
                        </div>
                        <i class="fa fa-box bg-icon"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="r3_counter_box p-0 blue-gradient">
                        <a class="" href="{{ route('clients.create') }}">
                        <div class="stats">
                            <i class="float-left fa fa-plus dollar2 icon-rounded"></i>
                        </div>
                            </a>
                            <a class="" href="{{ route('clients.create') }}">
                        <div class="stats">
                            <h5><strong>$450</strong></h5>
                            <span>Expenditure</span>
                        </div>

                        <i class="fa fa-edit bg-icon"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="r3_counter_box p-0 danger-gradient">
                        <a class="" href="{{ route('clients.create') }}">
                        <div class="stats">
                            <i class="fa fa-plus dollar2 icon-rounded"></i>
                        </div>
                        </a>
                        <a class="" href="{{ route('clients.create') }}">
                        <div class="stats">
                            <h5><strong>1450</strong></h5>
                            <span>Total Users</span>
                        </div>
                        <i class="fa fa-shopping-cart bg-icon"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
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
            <div class="clearfix"></div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="fa fa-file-contract"></i> Буюртмалар</h4>
            </div>
            <div class="card-body">
                <div class="b-table-stacked-lg">
                    @if(count($debts))
                        <table class="bg-light table data-table mb-0">
                            <thead>
                            <tr>
                                <th class="th-lg"><a>Буюуртма <i class="fas fa-sort ml-1"></i></a></th>
                                <th class="th-lg"><a>Мижоз <i class="fas fa-sort ml-1"></i></a></th>
                                <th class="th-lg"><a>Тулов суммаси <i class="fas fa-sort ml-1"></i></a></th>
                                <th class="th-lg"><a>Тулов тури <i class="fas fa-sort ml-1"></i></a></th>
                                <th class="th-lg"><a>Тулов санаси <i class="fas fa-sort ml-1"></i></a></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($debts as $debt)
                                <tr>
                                    <td><a class="btn btn-primary" href="{{ route('orders.show', $debt->order_id) }}"><i class="fa fa-shopping-cart"></i> {{ $debt->contract_number }}</a></td>
                                    <td><a class="btn btn-primary" href="{{ route('clients.show', $debt->client_id) }}"><i class="fa fa-user"></i> {{ $debt->client->full_name }}</a></td>
                                    <td><b>{{ number_format($debt->payment_amount, 0, '', ' ') }}</b></td>
                                    <td>
                                        @if(!$debt->payment_method)
                                            <i class="text-danger fa fa-window-close"></i> <b class="text-danger"> Туланмаган</b>
                                        @else
                                            <i class="text-success fa fa-check"></i> <b class="text-success"> {{ $debt->payment_method }}</b>
                                        @endif
                                    </td>
                                    <td>{{ $debt->payment_date }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{ $debt->links() }}
                        </table>
                    @else
                        <div class="align-center">
                            <h2>
                                <i class="fa fa-search"></i> Карздорлик топилмади
                            </h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
