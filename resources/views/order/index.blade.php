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
                    @if(count($orders))
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
                                            <!--a class="btn btn-info" href="{{ route('orders.edit', $order->id) }}" ><i class="fa fa-edit"></i></a-->
                                            <a class="btn btn-success" href="{{ url('/orders/'.$order->id.'/confirm' ) }}"><i class="fa fa-check"></i></a>
                                                <form class="float-right" method="post" action="{{ route('orders.destroy', $order->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                                                </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
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