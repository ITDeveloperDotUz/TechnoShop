@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mbtm-3">

            <div class="card-header">Янги булим</div>
            <div class="card-body">
                <form id="categoryForm" action="{{ route('categories.store') }}" class="form-horizontal" method="post">
                    @csrf
                    <v-category-form inline-template>
                        <div class="container">
                            <div class="form-group">
                                <label class="control-label col" for="name">Булим номланиши</label>
                                <div class="col-md-8">
                                    <input required class="form-control" id="name" type="text" name="name">
                                    <input class="" v-model="details" id="details" type="hidden" name="details">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col" for="description">Булим маълумотлари</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" v-model="description" name="description" id="description" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col" for="details">Булим параметрлари</label>
                                <div class="col-md-8">
                                    <button @click.prevent="addField()" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div ref="categoryField">

                            </div>
                            <div class="form-group">
                                <button @click="submit" class="btn btn-info" type="submit">Саклаш</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </v-category-form>
                </form>
            </div>
        </div>
    </div>
@endsection