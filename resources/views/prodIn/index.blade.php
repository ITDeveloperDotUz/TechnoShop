@extends('layouts.app')
@section('headers')

@endsection
@section('content')
    <div class="container">
        <div class="accordion md-accordion accordion-blocks" id="accordionEx78" role="tablist"
             aria-multiselectable="true">
            @foreach($prods as $key => $obj)
                <div class="card">
                <div class="card-header" role="tab" id="heading{{ $obj->category->value }}">
                    <a data-toggle="collapse" data-parent="#accordionEx78" href="#collapse{{ $obj->category->value }}" aria-expanded="true"
                       aria-controls="#collapse{{ $obj->category->value }}">
                        <h5 class="mt-1 mb-0">
                            <span>{{ $obj->category->label }}</span>
                            <i class="fas fa-angle-down rotate-icon"></i>
                        </h5>
                    </a>
                </div>
                <div id="collapse{{ $obj->category->value }}" class="collapse" role="tabpanel" aria-labelledby="#heading{{ $obj->category->value }}"
                     data-parent="#accordionEx78">
                    <div class="card-body">
                        <div class="table mx-3">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>

                                    </th>
                                    <th class="th-lg"><a>Name <i class="fas fa-sort ml-1"></i></a></th>
                                    <th class="th-lg"><a>Condition<i class="fas fa-sort ml-1"></i></a></th>
                                    <th class="th-lg"><a>Last edited<i class="fas fa-sort ml-1"></i></a></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td>Scroll % equals or greater than <strong>80</strong></td>
                                    <td>13.06.2017</td>
                                    <td></td>
                                </tr>
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