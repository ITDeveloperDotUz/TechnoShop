<script>
    import VSelect from 'vue-select';
    import VProdInProducts from './VProdInProducts';
    Vue.component('v-select', VSelect);

    export default {

        data: function(){
            return {
                productData: '',
                options: [],
                categories: '',
                date: moment().format("LL"),
                total: {
                    qty: 0,
                    tcost: 0,
                    tprice: 0,
                    profit: 0
                },
                jtotal: ''
            }
        },
        mounted(){
            let cats = document.getElementById('cats');
            let options = (JSON.parse(cats.value))
            let opts = [];
            for (let opt in options){
                let obj = {
                    label: options[opt].name,
                    value: options[opt].id
                };
                opts.push(obj)
            }
            this.options = opts
            window.components = []
        },
        methods: {
            calculate(){
                let qty = 0,tc = 0,tp = 0;
                for(let comp in components){
                    let c = components[comp].overall;

                    qty += +c.qty
                    tc += +c.total_spending
                    tp += +c.total_price
                }
                this.total.qty = qty
                this.total.tcost = (tc)
                this.total.tprice = (tp)
                this.total.profit = (tp - tc)
            },
            prepare(){
                let cats = [];
                for(let comp in components){
                    cats.push(JSON.parse(JSON.stringify(components[comp].$data)))
                }
                this.productData = JSON.stringify(cats)
                this.jtotal = JSON.stringify(this.total)
            },
            renderCategory(cat){
                let ext = Vue.extend(VProdInProducts);
                let comps = window.components;
                for(let comp in comps){
                    if(comps[comp].category.value === cat.value){
                        this.$refs.cats.appendChild(comps[comp].$el);
                        return;
                    }
                }
                let component = new ext({data: {category: cat}}).$mount()
                this.$refs.cats.appendChild(component.$el);
            },
            correct(number){
                return (((+number).toFixed(2)+ ' ').replace(/\B(?=(\d{3})+(?!\d))/g, ' '));
            }
        },
        watch: {
            categories(){
                this.$refs.cats.innerHTML = '';
                for(let cat in this.categories){
                    this.renderCategory(this.categories[cat]);
                }
            }
        }
    }
</script>
<style>

</style>