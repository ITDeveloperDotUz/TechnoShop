<template>
    <div class="form-group" :id="$options.name">
        <div class="row">
            <div class="col-sm-4">
                <input v-model="f_name" class="form-control" placeholder="" type="text">
            </div>
            <div class="col-sm-4">
                <select class="form-control" v-model="f_type" id="">
                    <option value="text">Матн</option>
                    <option value="number">Сон</option>
                    <option value="date">Сана</option>
                    <option value="checkbox">Белги</option>
                </select>
            </div>
            <div class="col-1">
                <input type="checkbox" v-model="f_req" :id="'chec'+$options.name" autocomplete="off" />
                <div class="[ btn-group ]">
                    <label :for="'chec'+$options.name" class="[ btn btn-primary ]">
                        <span class="fa fa-check"></span>
                        <span> </span>
                    </label>
                </div>
                <!--<input v-model="f_req" class="form-check" type="checkbox">-->
            </div>
            <div class="col-1">
                <button @click.prevent="removeField" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        mounted(){
            cfKeys[this.$options.name] = this._data;
        },
        data(){
            return {
                f_type: '',
                f_name: '',
                f_req: '',
                name: this.$options.name,
                id: this.$options.id,
            }
        },
        methods: {
            removeField: function(){
                this.$destroy();
                this.$el.parentNode.removeChild(this.$el);
                delete components[this.$options.name];
                delete cfKeys[this.$options.name];
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