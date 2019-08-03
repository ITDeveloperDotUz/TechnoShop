@extends('layouts.app')
@section('headers')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="mb-3 col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h4 class="card-title"><i class="fa fa-money-bill"></i> Излаш</h4>
                    </div>
                    <div class="card-body">
                        <div class="b-table-stacked-lg">
                            <form action="{{ route('payments.incomes', 'other') }}" method="post">
                                @csrf
                                <div class="form-group col-md-6">
                                    <label for="start"></label>
                                    <input class="form-control" type="date" id="start" name="start">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="end"></label>
                                    <input class="form-control" type="date" id="end" name="end">
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="submit" class="btn btn-primary">Излаш</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3 col-md-6">
                <div class="card">
                    <div class="card-header bg-green text-white">
                        <div class="float-left">
                            <h4 class="card-title"><i class="fa fa-dollar-sign"></i> Бугунги тушум</h4>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="">
                            @if(count($info))
                                <ul class="list-group">
                                    @foreach($info as $key => $val)
                                        <li class="list-group-item list-group-item-success">{{ $key }} - <b>{{ number_format($val, 0, '', ' ') }}</b></li>
                                    @endforeach
                                </ul>

                            @else
                                <div class="align-center">
                                    <h2>
                                        <i class="fa fa-search"></i> Бу кун учун тушум йук!
                                    </h2>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="fa fa-money-bill"></i> Тушумлар</h4>
            </div>
            <div class="card-body">
                <div class="b-table-stacked-lg">
                    @if(count($payments))
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
                            @foreach($payments as $payment)
                                <tr>
                                    <td><a class="btn btn-primary" href="{{ route('orders.show', $payment->order_id) }}"><i class="fa fa-shopping-cart"></i> {{ $payment->contract_number }}</a></td>
                                    <td><a class="btn btn-primary" href="{{ route('clients.show', $payment->client_id) }}"><i class="fa fa-user"></i> {{ $payment->client->full_name }}</a></td>
                                    <td><b>{{ number_format($payment->payment_amount, 0, '', ' ') }}</b></td>
                                    <td>
                                        @if(!$payment->payment_method)
                                            <i class="text-danger fa fa-window-close"></i> <b class="text-danger"> Туланмаган</b>
                                        @else
                                            <i class="text-success fa fa-check"></i> <b class="text-success"> {{ $payment->payment_method }}</b>
                                        @endif
                                    </td>
                                    <td>{{ $payment->payment_date }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{ $payments->links() }}
                        </table>
                    @else
                        <div class="align-center">
                            <h2>
                                <i class="fa fa-search"></i> Тушумлар топилмади
                            </h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection