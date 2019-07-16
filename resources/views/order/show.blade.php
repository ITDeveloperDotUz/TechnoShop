@extends('layouts.app')
@section('headers')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4>
                    <b>№000-{{ $order->id }} сонли буюртма</b>
                    @if(!$order->confirmed)
                        <div class="float-right">
                            <a class="btn btn-info" href="{{ route('orders.edit', $order->id) }}"><i class="fa fa-edit">Узгартириш</i></a>
                            <a class="btn btn-success" href="{{ url('/orders/'.$order->id.'/confirm' ) }}"><i class="fa fa-check"> Тасдиклаш</i></a>
                        </div>
                    @endif
                </h4>

            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-info"> </i> <b>Маълумотлар</b></a>
                    </li>
                    @if(count($payments) > 0 && $payments->first()->type != 1)
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-money-check-alt"> </i> <b>Туловлар</b></a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-boxes"> </i> <b>Махсулотлар</b></a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="border-top-0 table table-hover mb-0">
                            <tbody>
                            <?php $calc = json_decode($order->calculation); ?>
                            <tr>
                                <td><b>Мижоз</b></td>
                                <td><a href="{{ route('clients.show', $order->client_id) }}">{{ $order->client_name }}</a></td>
                            </tr>
                            <tr>
                                <td><b>Буюртма санаси</b></td>
                                <td>{{ $order->order_date }}</td>
                            </tr>
                            <tr>
                                <td><b>Тулов суммаси</b></td>
                                <td>{{ number_format($calc->total_price,0,'',' ') }}</td>
                            </tr>
                            <tr>
                                <td><b>Тулов</b></td>
                                <td>
                                    @if(!$payments->first()->payment_method && $payments->first()->type == 1)
                                        <button type="button" data-toggle="modal" data-target="#payModal" class="btn btn-success"><i class="fa fa-check"></i> Тулаш</button>
                                        <?php $pm = $payments->first()?>
                                        <?php $payment_id = $pm->id ?>
                                        <?php $payment_type = $pm->type ?>
                                        <?php $payment_date = $pm->payment_date?>
                                        <?php $payment_amount = $pm->payment_amount?>
                                        <?php $unpaid = true ?>
                                    @elseif($payments->first()->payment_method && $payments->first()->type == 1)
                                        <b class="text-success">Сана - {{ $payments->first()->payment_date }}</b>
                                        <br>
                                        <b class="text-success">Сумма - {{ number_format($payments->first()->payment_amount,0,'',' ') }}</b>
                                        <br>
                                        <i class="text-success fa fa-check"></i> <b class="text-success">Тури - {{ $payments->first()->payment_method }}</b>
                                    @else
                                        {{ number_format($order->paid_payment,0,'',' ') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><b>Жорий карздорлик</b></td>
                                <td>{{ number_format($order->remaining_payment,0,'',' ') }}</td>
                            </tr>
                            <tr>
                                <td><b>Умумий харажат</b></td>
                                <td>{{ number_format($calc->total_cost,0,'',' ') }}</td>
                            </tr>
                            <tr>
                                <td><b>Соф фойда</b></td>
                                <td>{{ number_format($calc->total_profit,0,'',' ') }}</td>
                            </tr>
                            <tr>
                                <td><b>Махсулотлар сони</b></td>
                                <td>{{ $calc->total_count }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    @if(count($payments) > 0)
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-striped border-top-0">
                            <thead>
                            <tr>
                                <th>Муддат</th>
                                <th>Суммаси</th>
                                <th>Санаси</th>
                                <th>Тури</th>
                                <th>Эслатма</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; $payment_id = 0 ?>
                            @foreach($payments as $pm)
                                <tr>
                                    @if($pm->type == 2)
                                        <td>Бошлангич тулов</td>
                                        <?php
                                            $i = 0;
                                        ?>
                                    @else
                                        <td>{{ $i }}-ой</td>
                                    @endif
                                    <td>{{ number_format($pm->payment_amount,0,'',' ') }}</td>
                                    <td>{{ $pm->payment_date }}</td>
                                    <td>
                                        @if(!$pm->payment_method && !$payment_id)
                                            <button type="button" data-toggle="modal" data-target="#payModal" class="btn btn-success"><i class="fa fa-check"></i> Тулаш</button>
                                            <?php $payment_id = $pm->id ?>
                                            <?php $payment_type = $pm->type ?>
                                            <?php $payment_date = $pm->payment_date?>
                                            <?php $payment_amount = $pm->payment_amount?>
                                            <?php $unpaid = true ?>
                                        @elseif (!$pm->payment_method && $payment_id)
                                            <i class="text-danger fa fa-window-close"></i> <b class="text-danger">Туланмаган</b>
                                        @else
                                            <i class="text-success fa fa-check"></i> <b class="text-success">{{ $pm->payment_method }}</b>
                                        @endif
                                    </td>
                                    <td>{{ $pm->note }}</td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td><b>Жами</b></td>
                                <td><b>{{ number_format($calc->total_price,0,'',' ') }}</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    @endif
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Махсулот номланиши</th>
                                <th>Махсулот маълумотлари</th>
                                <th>Махсулот нархи</th>
                                <th>Махсулот сони</th>
                                <th>Махсулот умумий нархи</th>
                                <th>Махсулот умумий тан нархи</th>
                                <th>Соф фоийда</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    </td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ number_format($product->price,0,'',' ') }}</td>
                                    <td>{{ $product->count }}</td>
                                    <td>{{ number_format($product->total_price,0,'',' ') }}</td>
                                    <td>{{ number_format($product->total_cost,0,'',' ') }}</td>
                                    <td>{{ number_format($product->profit,0,'',' ') }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Жами</th>
                                <td></td>
                                <td></td>
                                <td>{{ $calc->total_count }}</td>
                                <td>{{ number_format($calc->total_price,0,'',' ') }}</td>
                                <td>{{ number_format($calc->total_cost,0,'',' ') }}</td>
                                <td>{{ number_format($calc->total_profit,0,'',' ') }}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                @if(isset($unpaid))
                <div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="post" action="{{ url('payments/'.$payment_id.'/pay') }}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Туловни амалга ошириш</h5>
                                </div>
                                <div class="align-center modal-body">
                                    <h4 class=" text-success">Тулов микдори - {{ isset($payment_amount)?number_format($payment_amount,0,'',' '):'' }}</h4>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="payment_date">Тулов санаси</label>
                                            <input value="{{ isset($payment_date)?$payment_date:'' }}" name="payment_date" type="date" id="payment_date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="payment_method">Тулов тури</label>
                                            <select name="payment_method" id="payment_method" class="form-control">
                                                <option value="Карта утказмаси">Карта утказмаси</option>
                                                <option value="Карта оркали">Карта оркали</option>
                                                <option value="Банк утказмаси">Банк утказмаси</option>
                                                <option value="Накд">Накд</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="note">Эслатма</label>
                                            <input name="note" type="text" id="note" class="form-control">
                                            <input name="payment_type" value="{{ $payment_type }}" type="hidden">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Ёпиш</button>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Тулаш</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection