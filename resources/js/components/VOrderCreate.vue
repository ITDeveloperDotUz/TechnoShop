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
                id: 0,
                order_date: moment().format('YYYY-MM-DD'),
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
                payment_diff: 0,
                paid: false,
                sentData: ''
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

                this.calcPayment();
            },
            updated(val){
                this.selectedProducts[val.id].count = val.count || 1;
                this.selectedProducts[val.id].total_cost = val.total_cost || 0;
                this.selectedProducts[val.id].total_price = val.total_price || 0;
                this.selectedProducts[val.id].profit = val.profit || 0;
                this.recalculate();
            },
            calcPayment(){
                let pmc = this.payment_count;
                let tprice = this.calculation.total_price;
                let paid = this.paid_payment;
                let ifee = this.initial_fee;
                let rpm = this.remaining_payment;

                if(pmc == 0){
                    this.paid_payment = tprice;
                } else if (pmc > 0 && ifee > 0) {
                    this.paid_payment = ifee;
                    this.remaining_payment = tprice - ifee
                } else {
                    this.remaining_payment = tprice
                    this.paid_payment = 0
                }
                this.renderPayment();
            },
            renderPayment(){
                this.payments = {};
                let pms = this.payments;
                let pmc = this.payment_count;
                let rpm = this.remaining_payment;
                let monthly_pm = Math.round((rpm / pmc)/1000) * 1000;
                this.payment_diff = this.remaining_payment - (monthly_pm * pmc);

                for(let i = 0; i < pmc; i++){
                    pms['pm'+(i+1)] = {
                        payment_date: moment(this.order_date).add(i+1, 'M').format('YYYY-MM-DD'),
                        payment_amount: (i+1 == pmc)?monthly_pm + this.payment_diff:monthly_pm,
                        id: i+1
                    };
                }
            },
            submit(){
                if(!this.validate()){
                    return
                }
                this.sentData = {
                    client_id: this.client.value,
                    client_name: this.client.label,
                    payments: this.payments,
                    products: this.products,
                    calculation: this.calculation,
                    initial_fee: {
                        initial_fee: this.initial_fee,
                        payment_method: this.payment_method,
                        payment_type: this.payment_type,
                        payment_count: this.payment_count,
                        paid: this.paid,
                    },
                    paid_payment: this.paid_payment,
                    remaining_payment: this.remaining_payment,
                    order_date: this.order_date,
                };
                axios.post('/orders',
                    this.sentData
                ).then((response) => {
                    console.log(response.data)
                    this.id = response.data
                    //document.location = '/orders';
                }).catch(function (error) {
                    console.log(error);
                });
            },
            confirm(){
                axios.get(
                    '/orders/'+this.id+'/confirm',
                ).then((response) => {
                    console.log(response.data)
                })
            },
            validate(){
                if (!this.client.value){
                    alert('Mijozni tanlang');
                    return false;
                }
                if(this.products.length === 0){
                    alert('Maxsulotni tanlang');
                    return false;
                }
                return true
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
                        if(!sp[id].count){
                            sp[id].count = 1;
                        }
                    }
                    this.recalculate();

                },
                deep: true
            },
            payment_count: {
                handler(){
                    this.calcPayment()
                },
                deep: true,
            },
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