<script>
    export default {

        data: function(){
            return {
                details: '',
                description: '',
                category: '',
                real_cost: '',
                price: '',
                info: {}
            }
        },
        mounted(){
            axios
                .get('/products/' + this.$refs.pid.value + '/ajaxedit')
                .then((response) => {
                    this.details = response.data.details;
                    this.description = response.data.description;
                    this.real_cost = response.data.real_cost;
                    this.price = response.data.price;
                    this.info = JSON.parse(response.data.details);
                    this.category = response.data.category;
                });
        },
        methods: {
            renderCategory(){
                axios
                    .get('/products/' + this.category + '/getcategory')
                    .then((response) => {
                       this.info = (JSON.parse(response.data.details));
                    });
            },
            prepare(){
                this.details = JSON.stringify(this.info)
            }
        }
    }
</script>
