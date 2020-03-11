/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuetify from 'vuetify'
import Axios from 'axios';

Vue.use(Vuetify)
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
Vue.component('beranda', require('./components/Beranda.vue').default);
Vue.component('dashboard', require('./components/Dashboard.vue').default);
// Vue.component('kegiatan', require('./components/Kegiatan.vue').default);
Vue.component('formkegiatan', require('./components/FormKegiatan.vue').default);
Vue.component('ubahsandi', require('./components/UbahSandi.vue').default);
Vue.component('detail', require('./components/Detail.vue').default);
Vue.component('akunpengguna', require('./components/AkunPengguna.vue').default);
Vue.component('peserta', require('./components/Peserta.vue').default);

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
        akunpengguna(){
            this.firstFunction(function() {
                window.location.href = '/akunpengguna';
            });
        },
        ubahsandi(){
            this.firstFunction(function() {
                window.location.href = '/ubahsandi';
            });
        },
    },
});
