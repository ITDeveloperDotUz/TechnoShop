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
                    <table class="bg-light table data-table mb-0">
                        <thead>
                        <tr>
                            <th class="th-lg"><a>ID <i class="fas fa-sort ml-1"></i></a></th>
                            <th class="th-lg"><a>Мижоз <i class="fas fa-sort ml-1"></i></a></th>
                            <th class="th-lg"><a>Буюртма санаси <i class="fas fa-sort ml-1"></i></a></th>
                            <th class="th-lg"><a>Тулов суммаси <i class="fas fa-sort ml-1"></i></a></th>
                            <th class="th-lg"><a>Туланган сумма <i class="fas fa-sort ml-1"></i></a></th>
                            <th class="th-lg"><a>Карздорлик <i class="fas fa-sort ml-1"></i></a></th>
                            <th class="th-lg"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <?php $calc = json_decode($order->calculation); ?>
                                <td><a href="{{ route('orders.show', $order->id) }}">000-{{ $order->id }}</a></td>
                                <td><a href="{{ route('clients.show', $order->client_id) }}">{{ $order->client_name }}</a></td>
                                <td>{{ $order->order_date }}</td>
                                <td>{{ number_format($calc->total_price,0,'',' ') }}</td>
                                <td>{{ number_format($order->paid_payment,0,'',' ') }}</td>
                                <td>{{ number_format($order->remaining_payment,0,'',' ') }}</td>
                                <td>

                                    @if(!$order->confirmed)
                                        <a class="btn btn-info" href="{{ route('orders.edit', $order->id) }}" ><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-success" href="{{ url('/orders/'.$order->id.'/confirm' ) }}"><i class="fa fa-check"></i></a>
                                    @endif
                                    @if(count($order->payment) > 0)
                                        <a class="btn btn-primary" href="{{ url('/payments/'.$order->id.'/order' ) }}"><i class="fa fa-money-check"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection