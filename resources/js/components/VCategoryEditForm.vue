<script>
    import CategoryField from './CategoryField'

    function createCFComp(cfids){
        var cFComponent = Vue.extend(CategoryField);
        var categoryField = new cFComponent({name: 'catField'+cfids, id:cfids});
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
                name: ''
            }
        },
        mounted(){
            axios
            .get('/categories/' + this.$refs.catId.value + '/ajaxedit')
            .then((response) => {
                this.description = response.data.description;
                this.name = response.data.name;
                this.details = response.data.details;
                this.render()
            });
            window.components = this.components;
            window.cfKeys = this.cfKeys;
        },
        methods: {
            renderField(id = this.cfid, data){
                let newCF = this.components['catField'+id] = createCFComp(id);
                newCF._data.f_name = data.f_name;
                newCF._data.f_type = data.f_type;
                newCF._data.f_req = data.f_req;
                this.$refs.categoryField.appendChild(newCF.$el);
                this.cfid = id + 1
            },
            addField(){
                let newCF = this.components['catField'+this.cfid] = createCFComp(this.cfid);
                this.$refs.categoryField.appendChild(newCF.$el);
                this.cfid++;
            },
            submit(){
                this.details = JSON.stringify(this.cfKeys);
            },
            render(){
                let data = JSON.parse(this.details);
                for (let object in data){
                    this.renderField(object.id, data[object]);
                }
            }
        }
    }
</script>
