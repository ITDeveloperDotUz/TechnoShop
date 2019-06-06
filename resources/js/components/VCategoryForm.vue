<script>
    import CategoryField from './CategoryField'

    function createCFComp(cfids){
        var cFComponent = Vue.extend(CategoryField);
        var categoryField = new cFComponent({name: 'catField'+cfids,id:cfids});
        return categoryField.$mount();
    }

    export default {
        data: function(){
            return {
                cfid: 1,
                components: {},
                cfKeys: {},
                details: '',
                description: '',
            }
        },
        mounted(){
            window.components = this.components;
            window.cfKeys = this.cfKeys;
        },
        methods: {
            addField(){
                let newCF = this.components['catField'+this.cfid] = createCFComp(this.cfid);
                this.$refs.categoryField.appendChild(newCF.$el);
                this.cfid++;
            },
            submit(){
                this.details = JSON.stringify(this.cfKeys);
            },
            render(){

            }
        }
    }
</script>
