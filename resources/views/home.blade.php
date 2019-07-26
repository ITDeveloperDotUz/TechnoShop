
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif


    <div class="row">
        <div class="container-fluid">
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
                                    <h5><strong>{{ $clients }}</strong> та</h5>
                                    <span>Мижоз</span>
                                </div>
                                <i class="fa fa-user bg-icon"></i>
                            </a>
                        </div>

                </div>
                <div class="col-md-3">
                    <div class="r3_counter_box p-0 purple-gradient">
                        <a class="" href="{{ route('categories.create') }}">
                        <div class="stats">
                            <i class="float-left fa fa-bars dollar2 icon-rounded"></i>
                        </div>
                        </a>
                        <a class="" href="{{ route('categories.index') }}">
                        <div class="stats">
                            <h5><strong>{{ $categories }}</strong> та</h5>
                            <span>Булим</span>
                        </div>
                        <i class="fa fa-bars bg-icon"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="r3_counter_box p-0 orange-gradient">
                        <a class="" href="{{ route('products.create') }}">
                        <div class="stats">
                            <i class="float-left fa fa-box dollar2 icon-rounded"></i>
                        </div>
                        </a>
                        <a class="" href="{{ route('products.index') }}">
                        <div class="stats">
                            <h5><strong>{{ $products }}</strong> хил</h5>
                            <span>Махсулот</span>
                        </div>
                        <i class="fa fa-box bg-icon"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="r3_counter_box p-0 blue-gradient">
                        <a class="" href="{{ route('product_incomes.create') }}">
                        <div class="stats">
                            <i class="float-left fa fa-edit dollar2 icon-rounded"></i>
                        </div>
                            </a>
                            <a class="" href="{{ route('product_incomes.index') }}">
                        <div class="stats">
                            <h5><strong>{{ $prodIns }}</strong> та</h5>
                            <span>Кирим</span>
                        </div>

                        <i class="fa fa-edit bg-icon"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="r3_counter_box p-0 danger-gradient">
                        <a class="" href="{{ route('orders.create') }}">
                        <div class="stats">
                            <i class="fa fa-shopping-basket icon-rounded"></i>
                        </div>
                        </a>
                        <a class="" href="{{ route('orders.index') }}">
                        <div class="stats">
                            <h5><strong>{{ $orders }}</strong> та</h5>
                            <span>Буюртма</span>
                        </div>
                        <i class="fa fa-shopping-basket bg-icon"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="row mb-lg-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <div class="float-left">
                        <h4 class="card-title"><i class="fa fa-credit-card"></i> Туланмаган карзлар</h4>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-default text-white" href="{{ url('/payments/get/expired') }}"><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="b-table-stacked-lg">
                        @if(count($debts))
                            <table class="bg-light table data-table mb-0">
                                <thead>
                                <tr>
                                    <th class="th-lg"><a>Буюуртма <i class="fas fa-sort ml-1"></i></a></th>
                                    <th class="th-lg"><a>Мижоз <i class="fas fa-sort ml-1"></i></a></th>
                                    <th class="th-lg"><a>Тулов суммаси <i class="fas fa-sort ml-1"></i></a></th>
                                    <th class="th-lg"><a>Тулов санаси <i class="fas fa-sort ml-1"></i></a></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($debts as $debt)
                                    <tr>
                                        <td><a class="btn btn-primary" href="{{ route('orders.show', $debt->order_id) }}"><i class="fa fa-shopping-cart"></i> {{ $debt->contract_number }}</a></td>
                                        <td><a class="btn btn-primary" href="{{ route('clients.show', $debt->client_id) }}"><i class="fa fa-user"></i> {{ $debt->client->full_name }}</a></td>
                                        <td><b>{{ number_format($debt->payment_amount, 0, '', ' ') }}</b></td>
                                        <td>{{ $debt->payment_date }}</td>
                                    </tr>
                                @endforeach
                                </tbody>

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

    <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <div class="float-left">
                            <h4 class="card-title"><i class="fa fa-credit-card"></i> Бугунги тулов</h4>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-default text-white" href="{{ url('/payments/get/daily') }}"><i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="b-table-stacked-lg">
                            @if(count($dailyPayment))
                                <table class="bg-light table data-table mb-0">
                                    <thead>
                                    <tr>
                                        <th class="th-lg"><a>Буюуртма <i class="fas fa-sort ml-1"></i></a></th>
                                        <th class="th-lg"><a>Мижоз <i class="fas fa-sort ml-1"></i></a></th>
                                        <th class="th-lg"><a>Тулов суммаси <i class="fas fa-sort ml-1"></i></a></th>
                                        <th class="th-lg"><a>Тулов санаси <i class="fas fa-sort ml-1"></i></a></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dailyPayment as $dp)
                                        <tr>
                                            <td><a class="btn btn-primary" href="{{ route('orders.show', $dp->order_id) }}"><i class="fa fa-shopping-cart"></i> {{ $dp->contract_number }}</a></td>
                                            <td><a class="btn btn-primary" href="{{ route('clients.show', $dp->client_id) }}"><i class="fa fa-user"></i> {{ $dp->client->full_name }}</a></td>
                                            <td><b>{{ number_format($dp->payment_amount, 0, '', ' ') }}</b></td>
                                            <td>{{ $dp->payment_date }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            @else
                                <div class="align-center">
                                    <h2>
                                        <i class="fa fa-search"></i> Бу кун учун тулов йук!
                                    </h2>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
