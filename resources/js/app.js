/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;


Vue.component('create-prod', require('./components/CreateProd.vue').default);
Vue.component('index-prod', require('./components/IndexProd.vue').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// CKeditor
import CKEditor from 'ckeditor4-vue';

Vue.use( CKEditor );


const app = new Vue({
    el: '#app',
});
