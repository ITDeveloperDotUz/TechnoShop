@extends('layouts.app')
@section('headers')
    <link href="{{ asset('css/vue-select.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Янги буюртма</h3>
            </div>
            <div class="card-body">
                <form id="prodin_form" action="{{ route('product_incomes.store') }}" class="form-horizontal" method="post">
                    @csrf
                    <v-order-create inline-template>
                        <div class="">
                            <div class="form-group row">
                                <label for="client" class="col-md-2 col-form-label">Мижоз</label>
                                <div class="col-md-5">
                                    <v-select id="client" v-model="client" :options="clientOptions" class="mbtm-3"></v-select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="products" class="col-md-2 col-form-label">Махсулотлар</label>
                                <div class="col-md-5">
                                    <v-select multiple id="products" v-model="products" :options="productOptions" class="mbtm-3"></v-select>
                                </div>
                            </div>
                            <div class="">
                                <table class="table data-table"><h4>Танланган махсулотлар</h4>
                                    <thead>
                                    <th>Номи</th>
                                    <th>Сони</th>
                                    <th>Умумий нарх</th>
                                    <th>Умумий нарх</th>
                                    <th>Умумий нарх</th>
                                    </thead>
                                    <tbody>
                                        <tr is="v-product-options" v-model="products" v-for="aproduct in products" v-bind="aproduct" @update="updated"></tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </v-order-create>

                </form>




            </div>
        </div>
    </div>
@endsection