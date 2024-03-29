@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                        @if(count($products))
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <td>Махсулот номланиши</td>
                                    <td>Махсулот тури</td>
                                    <td>Махсулот маълумотлари</td>
                                    <td>Махсулот нархи</td>
                                    <td>
                                        <a class="btn btn-success float-right" href="{{ route('products.create') }}"><i class="fa fa-plus"></i></a>
                                    </td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            {{ $product->name }}
                                        </td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>

                                        <td><a class="btn btn-info float-right" href="{{ route('products.edit', [$product->id]) }}"><i class="fa fa-edit"></i></a></td>
                                        <td>
                                            <form class="pull-right" method="post" action="{{ route('products.destroy', [$product->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="card">
                                <div class="card-header">
                                    Киримлар
                                </div>
                                <div class="card-body">
                                    <i class="fa fa-search"></i> Маълумот топилмади
                                </div>
                            </div>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection