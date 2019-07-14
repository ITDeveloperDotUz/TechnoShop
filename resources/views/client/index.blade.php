@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="fa fa-user"></i> Мижозлар</h4>
            </div>
            <div class="card-body">
                @if(count($clients))
                    <table class="table table-striped bg-light">
                        <thead>
                        <tr>
                            <td>Ф.И.Ш</td>
                            <td>Телефон</td>
                            <td>Адрес</td>
                            {{--<td>Паспорт</td>--}}
                            {{--<td>Берилган</td>--}}
                            {{--<td>Берилган сана</td>--}}
                            <td>
                                <a class="btn btn-success float-right" href="{{ route('clients.create') }}"><i class="fa fa-plus"></i></a>
                            </td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>
                                    <a href="{{ route('clients.show', [$client->id]) }}">{{ $client->full_name }}</a>
                                </td>
                                <td>{{ $client->phone }}</td>
                                <td>{{ $client->address }}</td>
                                {{--<td>{{ $client->pass_sn }}</td>--}}
                                {{--<td>{{ $client->pass_gs }}</td>--}}
                                {{--<td>{{ $client->pass_gd }}</td>--}}
                                <td><a class="btn btn-info float-right" href="{{ route('clients.edit', [$client->id]) }}"><i class="fa fa-edit"></i></a></td>
                                <td>
                                    <form class="pull-right" method="post" action="{{ route('clients.destroy', [$client->id]) }}">
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
                    <div class="align-center">
                        <h2>
                            <i class="fa fa-search"></i> Маълумот топилмади
                        </h2>
                    </div>
                @endif


            </div>
        </div>
    </div>
@endsection