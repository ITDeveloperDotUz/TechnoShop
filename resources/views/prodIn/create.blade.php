@extends('layouts.app')
@section('headers')
    <link href="{{ asset('css/vue-select.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Янги кирим</h3>
            </div>
            <div class="card-body">
                <form id="prodin_form" action="{{ route('product_incomes.store') }}" class="form-horizontal" method="post">
            @csrf
            <input id="cats" type="hidden" value="{{ $cats }}">
            <v-prodin-create inline-template>
                <div>
                    <v-select multiple v-model="categories" :options="options" class="mbtm-3"></v-select>
                    <div ref="cats"></div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td><button class="btn btn-info" @click.prevent="calculate">Хисоблаш</button></td>
                            <td></td>
                        </tr></thead>
                        <tbody>
                        <tr>
                            <td>Сана</td>
                            <td>@{{ date }}</td>
                        </tr>
                        <tr>
                            <td>Махсулотлар сони</td>
                            <td>@{{ total.qty }}</td>
                        </tr>
                        <tr>
                            <td>Жами харажат микдори</td>
                            <td>@{{ correct(total.tcost) }}</td>
                        </tr>
                        <tr>
                            <td>Жами даромад микдори</td>
                            <td>@{{ correct(total.tprice) }}</td>
                        </tr>
                        <tr>
                            <td>Жами соф фойда микдори</td>
                            <td>@{{ correct(total.profit) }}</td>
                        </tr>
                        </tbody>
                        <tfoot><tr>
                            <td><button class="btn btn-success" @click="prepare">Saqlash</button></td>
                            <td></td></tr></tfoot>
                    </table>
                    <input type="hidden" name="product_data" v-model="productData">
                    <input type="hidden" name="total" v-model="jtotal">
                    <input type="hidden" name="tcost" v-model="total.tcost">
                    <input type="hidden" name="tprice" v-model="total.tprice">
                    <input type="hidden" name="profit" v-model="total.profit">
                </div>
            </v-prodin-create>
        </form>
            </div>
        </div>
    </div>
@endsection