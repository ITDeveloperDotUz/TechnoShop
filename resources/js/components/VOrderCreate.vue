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
                alldata: [],
                clients: [],
                client: 0,
                clientOptions: [],
                products: [],
                productOptions: []
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
                let cls = [];
                for (let product in products){
                    products[product].label = products[product].name;
                    products[product].value = products[product].id;
                }
                this.productOptions = products;
            },
            updated(val){
                console.log(val)
            }
        }
    }
</script>
<style scoped>
    .h-scroll {
        overflow-x: scroll;
    }
</style>