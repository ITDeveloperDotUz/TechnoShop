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
                                <label for="order_date" class="col-md-2 col-form-label">Буюртма санаси</label>
                                <div class="col-md-5">
                                    <input id="order_date" v-model="order_date" class="mbtm-3 form-control" type="date"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="client" class="col-md-2 col-form-label">Мижоз</label>
                                <div class="col-md-5">
                                    <v-select id="client" v-model="client" :options="clientOptions" class="mbtm-3"></v-select>
                                </div>
                                <div class="col-sm-2">
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
                                    <th>Соф фойда</th>
                                    <th>Тан нархи</th>
                                    </thead>
                                    <tbody>
                                        <tr is="v-product-options" v-model="products" v-for="aproduct in products" v-bind="aproduct" :key="'product'+aproduct.id" @update="updated"></tr>
                                    </tbody>
                                    <tfoot>
                                    <td>Жами: </td>
                                    <td><b>@{{ (calculation.total_count) }}</b></td>
                                    <td><b>@{{ c(calculation.total_price) }}</b></td>
                                    <td><b>@{{ c(calculation.total_profit) }}</b></td>
                                    <td><b>@{{ c(calculation.total_cost) }}</b></td>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </v-order-create>

                </form>




            </div>
        </div>
    </div>
@endsection