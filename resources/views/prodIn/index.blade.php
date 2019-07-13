@extends('layouts.app')
@section('headers')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="accordion md-accordion accordion-blocks" id="accordionEx78" role="tablist"
             aria-multiselectable="true">
            @foreach($cats as $key => $obj)
                <div class="card">
                <div class="card-header text-white bg-primary" role="tab" id="heading{{ $obj->id }}">
                    <a class="btn btn-primary" data-toggle="collapse" data-parent="#accordionEx78" href="#collapse{{ $obj->id }}" aria-expanded="true"
                       aria-controls="#collapse{{ $obj->id }}">
                        <h5 class="mt-1 mb-0">
                            <span>{{ $obj->name }}</span>
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                    </a>
                    <div class="col-md-3 float-right">
                        <b>Умумий даромад</b> - {{ number_format($obj->total_price,0,'',' ') }}<br>
                        <b>Соф фойда</b> - {{ number_format($obj->profit,0,'',' ') }}
                    </div>
                    <div class="col-md-3 float-right">
                        <b>Сони</b> - {{ $obj->quantity }}<br>
                        <b>Умумий харажат</b> - {{ number_format($obj->total_cost,0,'',' ') }}
                    </div>
                </div>
                <div
                        id="collapse{{ $obj->id }}"
                        class="card-body collapse"
                        role="tabpanel"
                        aria-labelledby="#heading{{ $obj->id }}"
                        data-parent="#accordionEx78"
                >
                    <div class="">
                        <div class="table mx-3">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th class="th-lg"><a>Номи <i class="fas fa-sort ml-1"></i></a></th>
                                    <th class="th-lg"><a>Сони <i class="fas fa-sort ml-1"></i></a></th>
                                    <th class="th-lg"><a>Тан нархи <i class="fas fa-sort ml-1"></i></a></th>
                                    <th class="th-lg"><a>Сотув нархи <i class="fas fa-sort ml-1"></i></a></th>
                                    <th class="th-lg"><a>Умумий харажат <i class="fas fa-sort ml-1"></i></a></th>
                                    <th class="th-lg"><a>Умумий даромад <i class="fas fa-sort ml-1"></i></a></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($obj->product as $product)
                                    @if($product->available)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->available }}</td>
                                        <td>{{ number_format($product->real_cost,0,'',' ') }}</td>
                                        <td>{{ number_format($product->price,0,'',' ') }}</td>
                                        <td>{{ number_format($product->total_cost,0,'',' ') }}</td>
                                        <td>{{ number_format($product->total_price,0,'',' ') }}</td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection