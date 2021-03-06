/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuetify from 'vuetify'
import Axios from 'axios';
import VeeValidate, { Validator } from "vee-validate";
import id from "vee-validate/dist/locale/id";

Vue.use(Vuetify)
Validator.localize({ id: id });
Vue.use(VeeValidate, { locale: "id" });
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('dashboard', require('./components/Dashboard.vue').default);
Vue.component('dashboardadmin', require('./components/DashboardAdmin.vue').default);
Vue.component('formkegiatan', require('./components/FormKegiatan.vue').default);
Vue.component('ubahsandi', require('./components/UbahSandi.vue').default);
Vue.component('detail', require('./components/Detail.vue').default);
Vue.component('akunpengguna', require('./components/AkunPengguna.vue').default);
Vue.component('peserta', require('./components/Peserta.vue').default);
Vue.component('detailpeserta', require('./components/DetailPeserta.vue').default);
Vue.component('cardKel', require('./components/cardKel.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const vuetify = new Vuetify();
const app = new Vue({
    el: '#app',
    vuetify,
    data: ()=>({
        fad:false,
        drawer: null,
        show1: false, //*password login
        loading: false, //* loading halaman
    }),
    methods: {
        firstFunction(_callback){
            // do some asynchronous work
            // and when the asynchronous stuff is complete
            this.loading=true;
            _callback();
        },
        dashboardAdmin(){
            this.firstFunction(function() {
                window.location.href = '/admin';
            });
        },
        dashboard(){
            this.firstFunction(function() {
                window.location.href = '/dashboard';
            });
        },
        formkegiatan(){
            this.firstFunction(function() {
                window.location.href = '/formkegiatan';
            });
        },
        peserta(){
            this.firstFunction(function() {
                window.location.href = '/peserta';
            });
        },
        pengguna(){
            this.firstFunction(function() {
                window.location.href = '/pengguna';
            });
        },
        ubahsandi(){
            this.firstFunction(function() {
                window.location.href = '/ubahsandi';
            });
        },
    },
});
