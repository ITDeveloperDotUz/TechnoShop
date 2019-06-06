@extends('layouts.app')

@section('content')
    <div class="container">
        @if(count($errors))
            <div class="card">
                <div class="card-header alert-danger">{{ count($errors) }} та хато мавжуд</div>
                <div class="card-body alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="card mbtm-3">

            <div class="card-header">Янги мижоз

                <form class="float-right" method="post" action="{{ route('clients.destroy', [$client->id]) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                </form>
            </div>
            <div class="card-body">
                <form action="{{ route('clients.update', [$client->id]) }}" class="form-horizontal" method="post">
                    @csrf
                    @method('put')
                    <v-client-form inline-template>
                        <div class="container">
                            <div class="form-group">
                                <label class="control-label col" for="full_name">Ф.И.Ш</label>
                                <div class="col-md-8">
                                    <input required class="form-control" id="full_name" type="text" value="{{ $client->full_name }}" name="full_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col" for="address">Манзил</label>
                                <div class="col-md-8">
                                    <input required class="form-control" id="address" type="text" name="address"  value="{{ $client->address }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col" for="phone">Телефон раками</label>
                                <div class="col-md-8">
                                    <input required class="form-control" id="phone" type="text" name="phone"  value="{{ $client->phone }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col" for="pass_sn">Паспорт серия в раками</label>
                                <div class="col-md-8">
                                    <input required class="form-control" id="pass_sn" type="text" name="pass_sn" value="{{ $client->pass_sn }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col" for="pass_gs">Ким томонидан берилган</label>
                                <div class="col-md-8">
                                    <input required class="form-control" id="pass_gs" type="text" name="pass_gs"  value="{{ $client->pass_gs }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col" for="pass_gd">Берилган сана</label>
                                <div class="col-md-8">
                                    <input required class="form-control" id="pass_gd" type="date" name="pass_gd"  value="{{ $client->pass_gd }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info" type="submit">Саклаш</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </v-client-form>
                </form>
            </div>
        </div>
    </div>
@endsection