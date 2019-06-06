<template>
    <div>
        <div class="card mbtm-3">
            <div class="card-header">{{ category.label }} <button @click.prevent="addField" class="btn btn-success float-right"><i class="fa fa-plus"></i></button></div>
            <div class="card-body">
                <div v-for="(field, key) in fields" class="form-group" :id="'pr' + field.id + 'cat' + category.value">
                    <div class="row">
                        <div class="col-md-2">
                            <select class="form-control" id="">
                                <option v-for="product in products" :value="product.id">{{ product.name }}</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" v-model="field.note" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <input type="number" v-model.lazy="field.qty" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <input type="number" v-model.lazy="field.real_cost" class="form-control">
                            <input readonly type="number" v-model="field.tcost" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <input type="number" v-model.lazy="field.price" class="form-control">
                            <input readonly type="number" v-model="field.tprice" class="form-control">
                        </div>
                        <div class="col-md-1">
                            <button @click.prevent="removeField(key)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <br>Жами {{ category.label }}лар сони {{ overall.qty }}
                <br>Умумий харажат {{ correct(overall.total_spending) }}
                <br>Умумий даромад {{ correct(overall.total_price) }}
                <br>Умумий соф фойда {{ correct(overall.profit) }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted(){
            axios
                .get('/product_incomes/getbycategory/' + this.category.value)
                .then((response) => {
                    this.products = response.data
                });
            window.components.push(this)
        },
        data(){
            return {
                category: '',
                fields: [],
                products: [],
                overall: {
                    qty: 0,
                    total_price: 0,
                    total_spending: 0,
                    profit: 0
                }
            }
        },
        methods: {
            removeField(id){
                this.fields.splice(id, 1);
            },
            addField(){
                this.fields.push({
                        type: '',
                        qty: 0,
                        real_cost: 0,
                        price: 0,
                        tcost: 0,
                        tprice: 0,
                        note: '',
                });
            },
            calcFields(data){
                data.tprice = data.price * data.qty
                data.tcost = data.real_cost * data.qty
                return data;
            },
            calc(){
                let qty = 0, tprice = 0, tspent = 0;
                for(let afield in this.fields){
                    let data = this.fields[afield];
                    let result = this.calcFields(data);
                    qty += +data.qty;
                    tprice += result.tprice;
                    tspent += result.tcost;
                }
                this.overall.qty = qty,
                this.overall.total_price = tprice,
                this.overall.total_spending = tspent;
                this.overall.profit = tprice - tspent;
            },
            correct(number){
                return (((+number).toFixed(2)+ ' ').replace(/\B(?=(\d{3})+(?!\d))/g, ' '));
            }
        },
        watch: {
            fields: {
                handler(){
                    this.calc()
                },
                deep: true
            },
        }
    }
</script>