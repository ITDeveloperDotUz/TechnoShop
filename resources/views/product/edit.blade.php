@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mbtm-3">
            <div class="card-header">Махсулотни узгартириш</div>
            <div class="card-body">
                <form id="categoryForm" action="{{ route('products.update', $product->id) }}" class="form-horizontal" method="post">
                    @csrf
                    @method('put')
                    <v-product-edit inline-template>
                        <div class="container">
                            <div class="form-group">
                                <label class="control-label col" for="name">Махсулот номланиши</label>
                                <div class="col-md-8">
                                    <input required class="form-control" id="name" type="text" name="name" value="{{ $product->name }}">
                                    <input v-model="details" id="details" type="hidden" name="details">
                                    <input ref="pid" type="hidden" value="{{ $product->id }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col" for="description">Махсулот маълумотлари</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" v-model="description" name="description" id="description" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col" for="category">Махсулот тури</label>
                                <div class="col-md-8">
                                    <select class="form-control" @change="renderCategory" required name="category" v-model="category" id="category">
                                        @foreach($cats as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col" for="real_cost">Махсулот тан нархи</label>
                                <div class="col-md-8">
                                    <input required v-model="real_cost" class="form-control" id="real_cost" type="number" name="real_cost">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col" for="price">Махсулот нархи</label>
                                <div class="col-md-8">
                                    <input required v-model="price" class="form-control" id="price" type="number" name="price">
                                </div>
                            </div>

                            <div v-if="category" ref="productField">
                                <div v-for="det in info" class="form-group">
                                    <label class="control-label col" :for="det.name">@{{ det.f_name }}</label>
                                    <div class="col-md-8">
                                        <input v-model="info[det.name].value" :id="det.name" :required="det.f_req" class="form-control" :type="det.f_type" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input @click="prepare" class="btn btn-info" type="submit" value="Саклаш">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </v-product-edit>
                </form>
            </div>
        </div>
    </div>
@endsection
