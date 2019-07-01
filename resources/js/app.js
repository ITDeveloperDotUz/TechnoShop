
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');
window.$ = window.jQuery;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('v-category-form', require('./components/VCategoryForm.vue').default);
Vue.component('v-category-edit-form', require('./components/VCategoryEditForm.vue').default);

Vue.component('v-client-form', require('./components/VClientForm.vue').default);

Vue.component('v-product-create', require('./components/VProductCreate.vue').default);
Vue.component('v-product-edit', require('./components/VProductEdit.vue').default);

Vue.component('v-prodin-create', require('./components/VProdInCreate.vue').default);
Vue.component('v-prodin-products', require('./components/VProdInProducts.vue').default);

Vue.component('v-order-create', require('./components/VOrderCreate.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
moment.locale('ru');