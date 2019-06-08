<script>
    export default {

        data: function(){
            return {
                details: '',
                description: '',
                category: '',
                real_cost: '',
                price: '',
                available: 0,
                total_cost: '',
                total_price: '',
                profit: '',
                info: {}
            }
        },
        mounted(){

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
