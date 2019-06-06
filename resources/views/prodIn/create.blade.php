@extends('layouts.app')
@section('headers')
    <link href="{{ asset('css/vue-select.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <form id="" action="{{ route('product_incomes.store') }}" class="form-horizontal" method="post">
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

        <div class="accordion mbtm-3" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Collapsible Group Item #1
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Collapsible Group Item #2
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Collapsible Group Item #3
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection