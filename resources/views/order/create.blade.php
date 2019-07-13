@extends('layouts.app')
@section('headers')
    <link href="{{ asset('css/vue-select.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="mbtm-3">
            <div class="">
                <form id="order_create_form" action="{{ route('orders.store') }}" class="form-horizontal" method="post">
                    @csrf
                    <v-order-create inline-template>
                        <div class="">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Асосий маълумотлар</h4>
                                </div>
                                <div class="card-body">
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
                                </div>
                            </div>
                            <hr>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Танланган махсулотлар</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table data-table">
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
                            <hr>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Тулов</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="payment_count" class="col-md-2 col-form-label">Туловлар сони</label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="" v-model="payment_count" id="payment_count">
                                                <option value="0">Бир вактда</option>
                                                <option value="1">1 ой</option>
                                                <option value="2">2 ой</option>
                                                <option value="3">3 ой</option>
                                                <option value="4">4 ой</option>
                                                <option value="5">5 ой</option>
                                                <option value="6">6 ой</option>
                                                <option value="7">7 ой</option>
                                                <option value="8">8 ой</option>
                                                <option value="9">9 ой</option>
                                                <option value="10">10 ой</option>
                                                <option value="11">11 ой</option>
                                                <option value="12">12 ой</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div v-show="payment_count > 0" class="form-group row">
                                        <label for="initial_fee" class="col-md-2 col-form-label">Бошлангич тулов</label>
                                        <div class="col-md-4">
                                            <input @change="calcPayment" v-model.lazy="initial_fee" class="form-control" type="number" placeholder="Cум" name="initial_fee" id="initial_fee">
                                        </div>
                                    </div>
                                    <div v-show="payment_count > 0" class="bg-info-o p-2 mb-3">
                                        <div v-for="payment in payments" :key="'payment_'+payment.id" class="form-group row">
                                            <label class="col-md-2 col-form-label">@{{ payment.id }}-ой</label>
                                            <div class="col-md-4">
                                                <input v-model="payment.payment_amount" class="form-control" type="number" placeholder="Cум" min="0" disabled />
                                            </div>
                                            <label class="col-md-2 col-form-label">Тулов санаси</label>
                                            <div class="col-md-4">
                                                <input v-model="payment.payment_date" class="form-control" type="date" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  for="total_payment" class="col-md-2 col-form-label">Умумий тулов</label>
                                        <div class="col-md-4">
                                            <input disabled id="total_payment" v-model="total_payment" class="form-control" type="number" placeholder="Cум" name="total_payment">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="paid_payment" class="col-md-2 col-form-label">Жорий тулов</label>
                                        <div class="col-md-4">
                                            <input disabled id="paid_payment" v-model="paid_payment" class="form-control" type="number" placeholder="Cум" name="paid_payment">
                                        </div>
                                        <label v-show="paid_payment > 0" class="col-xs-6 col-md-2 col-form-label">Туланди</label>
                                        <div v-show="paid_payment > 0" class="col">
                                            <input id="paid" v-model="paid" class="form-control" type="checkbox" name="paid">
                                            <div class="[ btn-group ]">
                                                <label for="paid" class="[ btn btn-primary ]">
                                                    <span class="fa fa-check"></span>
                                                    <span> </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-show="payment_count > 0" class="form-group row">
                                        <label for="remaining_payment" class="col-md-2 col-form-label">Колдик тулов</label>
                                        <div class="col-md-4">
                                            <input disabled id="remaining_payment" v-model="remaining_payment" class="form-control" type="number" placeholder="Cум" name="remaining_payment">
                                            <input v-model="sentData" type="hidden" name="sent">
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button @click.prevent="submit" class="btn btn-success"><i class="fa fa-save"></i> Саклаш</button>
                                        <button id="confirmed" v-show="id !== 0" @click.prevent="confirm" class="btn btn-primary"><i class="fa fa-check"></i> Тасдиклаш</button>
                                    </div>
                                </div>
                            </div>
                            <div id="error"></div>
                        </div>
                    </v-order-create>
                </form>
            </div>
        </div>
    </div>
@endsection