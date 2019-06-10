@extends('layouts.app')
@section('headers')

@endsection
@section('content')
    <div class="container">
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
                        <b>Умумий даромад</b> - {{ $obj->total_price }}<br>
                        <b>Соф фойда</b> - {{ $obj->profit }}
                    </div>
                    <div class="col-md-3 float-right">
                        <b>Сони</b> - {{ $obj->quantity }}<br>
                        <b>Умумий харажат</b> - {{ $obj->total_cost }}
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
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->available }}</td>
                                    <td>{{ $product->real_cost }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->total_cost }}</td>
                                    <td>{{ $product->total_price }}</td>
                                </tr>
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