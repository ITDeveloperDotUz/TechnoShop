@extends('layouts.app')
@section('headers')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="fa fa-file-contract"></i> Буюртмалар</h4>
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
                                <i class="fa fa-search"></i> Маълумот топилмади
                            </h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection