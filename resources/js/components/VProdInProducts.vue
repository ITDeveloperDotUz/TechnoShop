<template>
    <div>
        <div class="card mbtm-3">
            <div class="card-header">{{ category.label }} <button @click.prevent="addField" class="btn btn-success float-right"><i class="fa fa-plus"></i></button></div>
            <div class="card-body">
                <div v-for="(field, key) in fields" class="form-group" :id="'pr' + field.id + 'cat' + category.value">
                    <div class="row">
                        <div class="col-md-2">
                            <select v-model="field.id" class="form-control" id="">
                                <option v-for="product in products" :value="product.id">{{ product.name }}</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" v-model="field.note" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <input type="number" v-model.lazy="field.available" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <input type="number" v-model.lazy="field.real_cost" class="form-control">
                            <input readonly type="number" v-model="field.total_cost" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <input type="number" v-model.lazy="field.price" class="form-control">
                            <input readonly type="number" v-model="field.total_price" class="form-control">
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
                    id: '',
                    available: 0,
                    real_cost: 0,
                    price: 0,
                    total_cost: 0,
                    total_price: 0,
                    profit: 0,
                    note: '',
                });
            },
            calcFields(data){
                data.total_price = data.price * data.available
                data.total_cost = data.real_cost * data.available
                data.profit =  data.total_price - data.total_cost
                return data;
            },
            calc(){
                let available = 0, total_price = 0, total_cost = 0;
                for(let afield in this.fields){
                    let data = this.fields[afield];
                    let result = this.calcFields(data);
                    available += +data.available;
                    total_price += result.total_price;
                    total_cost += result.total_cost;
                }
                this.overall.qty = available,
                    this.overall.total_price = total_price,
                    this.overall.total_spending = total_cost;
                this.overall.profit = total_price - total_cost;
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