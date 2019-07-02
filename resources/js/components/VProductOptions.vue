<template>
    <tr>
        <td>{{ name }}</td>
        <td>
            <div class="">
                <div class="input-group counter">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-danger btn-number" @click.prevent="subtract">
                            <span class="fa fa-minus"></span>
                        </button>
                    </span>
                    <input type="text" disabled v-model="count" class="form-control input-number" value="1" min="1" :max="available">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-success btn-number" @click.prevent="add">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div>
        </td>
        <td><b>{{ c(computed_price) }}</b></td>
        <td>{{ c(computed_profit) }}</td>
        <td>{{ c(computed_cost) }}</td>
    </tr>
</template>

<script>
    export default {
        name: "VProductOptions",
        props: {
            name: '',
            id: 0,
            details: '',
            description: '',
            category: '',
            real_cost: 0,
            price: 0,
            available: 0,
            total_cost: 0,
            total_price: 0,
            profit: 0,

        },
        data(){
            return {
                count: 1,
                min: 1,
            }
        },
        mounted(){
            //console.log(this.computed_price)
            this.update();
        },
        computed: {
            computed_price(){
                return this.count * this.price
            },
            computed_profit(){
                return this.count * (this.price - this.real_cost)
            },
            computed_cost(){
                return this.count * this.real_cost
            }
        },
        methods: {
            add(){
                if ((this.count += 1) > this.available){
                    this.count = this.available;
                }
            },
            subtract(){
                if ((this.count -= 1) < this.min){
                    this.count = this.min;
                }
            },
            update(){
                //let data = Object.assign({}, this._data, this._props);
                this.$emit('update',{id: 'product'+this.id, count: this.count});
            },
            c(number){
                return (((+number).toFixed(2)+ ' ').replace(/\B(?=(\d{3})+(?!\d))/g, ' '));
            }
        },
        watch: {
            count: {
                handler(){
                    this.update()
                },
                deep: true
            }
        }
    }
</script>

<style scoped>
    .counter{
        width: 100%;
        margin: 0;
    }

    .counter .input-number {
        text-align: center;
        padding: 2px;
        min-width: 20px;
        max-width: 80px;
    }
</style>