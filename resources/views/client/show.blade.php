@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8"><h4>Мижоз маълумотлари</h4></div>
                <div class="col">
                    <form class="float-right" method="post" action="{{ route('clients.destroy', [$client->id]) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                    </form>

                    <a class="btn btn-info float-right" href="{{ route('clients.edit', [$client->id]) }}"><i class="fa fa-edit"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td>Ф.И.Ш.</td>
                    <td id="full_name">{{ $client->full_name }}</td>
                </tr>
                <tr>
                    <td>Телефон раками</td>
                    <td id="phone">{{ $client->phone }}</td>
                </tr>
                <tr>
                    <td>Манзил</td>
                    <td id="address">{{ $client->address }}</td>
                </tr>
                <tr>
                    <td>Паспорт</td>
                    <td id="pass_sn">{{ $client->pass_sn }}</td>
                </tr>
                <tr>
                    <td>Берилган</td>
                    <td id="pass_gs">{{ $client->pass_gs }}</td>
                </tr>
                <tr>
                    <td>Берилган сана</td>
                    <td id="pass_gd">{{ $client->pass_gd }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection