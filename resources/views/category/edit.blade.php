@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card mbtm-3">

            <div class="card-header">Булимни узгартириш

                <form class="float-right" method="post" action="{{ route('categories.destroy', [$category->id]) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                </form>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update', [$category->id]) }}" class="form-horizontal" method="post">
                    @csrf
                    @method('put')
                    <v-category-edit-form inline-template>
                        <div class="container">
                            <div class="form-group">
                                <label class="control-label col" for="name">Булим номланиши</label>
                                <div class="col-md-8">
                                    <input required v-model="name" class="form-control" id="name" type="text" name="name" value="">
                                    <input class="" v-model="details" id="details" type="hidden" name="details" value="">
                                    <input class="" ref="catId" type="hidden" name="" value="{{ $category->id }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col" for="description">Булим маълумотлари</label>
                                <div class="col-md-8">
                                    <textarea name="description" v-model="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col" for="details">Булим параметрлари</label>
                                <div class="col-md-8">
                                    <button @click.prevent="addField()" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                    <button class="btn btn-info" @click.prevent="submit" type="button">Тасдиклаш</button>
                                </div>

                            </div>
                            <div ref="categoryField">

                            </div>
                            <div class="form-group">
                                <button class="btn btn-info" type="submit">Саклаш</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </v-category-edit-form>
                </form>
            </div>
        </div>
    </div>
@endsection