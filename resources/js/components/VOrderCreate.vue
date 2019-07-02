<script>
    import VSelect from 'vue-select';
    import VProductOptions from './VProductOptions';
    Vue.component('v-select', VSelect);
    Vue.component('v-product-options', VProductOptions);

    export default {
        components: {
            'v-product-options': VProductOptions,
        },
        data: function(){
            return {
                order_date: '',
                alldata: [],
                clients: [],
                client: 0,
                clientOptions: [],
                products: [],
                productOptions: [],
                selectedProducts: {},
                calculation: {
                    total_price: 0,
                    total_cost: 0,
                    total_profit: 0,
                    total_count: 0,
                },

                payments: {},
                payment_method: 0,
                payment_type: 0,
                payment_count: 0,
                initial_fee: 0,
                initial_fee_percent: 0,
                paid_payment: 0,
                remaining_payment: 0,
                paid: false,
                //total_payment: this.calculation.total_price
            }
        },
        mounted(){
            axios
                .get('/orders/0/getdata')
                .then((response) => {
                    let data = (response.data);
                    this.alldata = data;
                    this.renderClients(data.clients);
                    this.renderProducts(data.products);
                });
        },
        computed: {
            total_payment(){
                return this.calculation.total_price
            },
        },
        methods: {
            renderClients(clients){
                let cls = [];
                for (let client in clients){
                    let obj = {
                        label: clients[client].full_name,
                        value: clients[client].id
                    };
                    cls.push(obj);
                }
                this.clientOptions = cls;
            },
            renderProducts(products){
                for (let product in products){
                    products[product].label = products[product].name;
                    products[product].value = products[product].id;
                }
                this.productOptions = products;
            },
            recalculate(){
                let sp = this.selectedProducts;
                let calc = this.calculation;
                calc.total_count = 0;
                calc.total_profit = 0;
                calc.total_cost = 0;
                calc.total_price = 0;
                for(let pr in sp){
                     calc.total_count += sp[pr].count;
                     calc.total_profit += sp[pr].count * (sp[pr].price - sp[pr].real_cost);
                     calc.total_cost += sp[pr].count * sp[pr].real_cost;
                     calc.total_price += sp[pr].count * sp[pr].price;
                }
            },
            updated(val){
                this.selectedProducts[val.id].count = val.count;

                this.recalculate();
            },

            c(number){
                return (((+number).toFixed(2)+ ' ').replace(/\B(?=(\d{3})+(?!\d))/g, ' '));
            }
        },
        watch: {
            products: {
                handler(){
                    let prods = this.products;
                    let sp = this.selectedProducts = {};
                    for(let pr in prods){
                        let id = 'product'+prods[pr].id
                        sp[id] = prods[pr];
                    }

                    this.recalculate()
                },
                deep: true
            },
            payment_count: {
                handler(){
                    let pms = this.payments;
                    let pmc = this.payment_count;
                    let tprice = this.calculation.total_price;
                    let paid = this.paid_payment;
                    let ifee = this.initial_fee;
                    let rpm = this.remaining_payment;
                    rpm = tprice - ifee;
                    let monthly_pm = rpm / pmc;
                    console.log(monthly_pm);
                    for(let i = 0; i < pmc; i++){
                        pms['pm'+(i+1)] = {
                            payment_date: new Date(),
                            payment_amount: monthly_pm
                        };
                    }
                },
                deep: true,
            }
        }
    }
</script>
<style scoped>
    .form-group input[type="checkbox"] {
        display: none;
    }

    .form-group input[type="checkbox"] + .btn-group > label span {
        width: 20px;
    }

    .form-group input[type="checkbox"] + .btn-group > label span:first-child {
        display: none;
    }
    .form-group input[type="checkbox"] + .btn-group > label span:last-child {
        display: inline-block;
    }

    .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
        display: inline-block;
    }
    .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
        display: none;
    }
</style>