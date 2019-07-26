
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');
window.niceScroll = require('niceScroll');
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


$('#sidebarCollapse').click(function (e) {

    if ($('#content').hasClass('sidebar-active')){
        $("#content").removeClass('sidebar-active');
    } else {
        $("#content").addClass('sidebar-active');
    }


    $(".leftside-navigation").niceScroll({
        cursorcolor: "#1FB5AD",
        cursorborder: "0px solid #fff",
        cursorborderradius: "0px",
        cursorwidth: "3px"
    });

    $('#sidebar').toggleClass('hide-left-bar');
    if ($('#sidebar').hasClass('hide-left-bar')) {
        $(".leftside-navigation").getNiceScroll().hide();
    }
    $(".leftside-navigation").getNiceScroll().show();
    $('#main-content').toggleClass('merge-left');
    e.stopPropagation();
    if ($('#container').hasClass('open-right-panel')) {
        $('#container').removeClass('open-right-panel')
    }
    if ($('.right-sidebar').hasClass('open-right-bar')) {
        $('.right-sidebar').removeClass('open-right-bar')
    }

    if ($('.header').hasClass('merge-header')) {
        $('.header').removeClass('merge-header')
    }
});
$('.toggle-right-box .fa-bars').click(function (e) {
    $('#container').toggleClass('open-right-panel');
    $('.right-sidebar').toggleClass('open-right-bar');
    $('.header').toggleClass('merge-header');

    e.stopPropagation();
});

$('.header,#main-content,#sidebar').click(function () {
    if ($('#container').hasClass('open-right-panel')) {
        $('#container').removeClass('open-right-panel')
    }
    if ($('.right-sidebar').hasClass('open-right-bar')) {
        $('.right-sidebar').removeClass('open-right-bar')
    }

    if ($('.header').hasClass('merge-header')) {
        $('.header').removeClass('merge-header')
    }
});
