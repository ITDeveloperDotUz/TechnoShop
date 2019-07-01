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
                    <input type="number" disabled v-model="count" class="form-control input-number" value="1" min="1" :max="available">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-success btn-number" @click.prevent="add">
                            <span class="fa fa-plus"></span>
                        </button>
                    </span>
                </div>
            </div>
        </td>
        <td><b>{{ c(computed_price) }}</b></td>
        <td>{{ name }}</td>
        <td>{{ name }}</td>
    </tr>
</template>

<script>
    export default {
        name: "VProductOptions",
        props: {
            name: '',
            id: '',
            details: '',
            description: '',
            category: '',
            real_cost: '',
            price: '',
            available: 0,
            total_cost: '',
            total_price: '',
            profit: '',
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
            def_price(){
                return +this.price;
            },
            computed_price(){
                return this.def_price * this.count
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
                this.$emit('update',this._data);
            },
            c(number){
                return (((+number).toFixed(2)+ ' ').replace(/\B(?=(\d{3})+(?!\d))/g, ' '));
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
    }
</style>