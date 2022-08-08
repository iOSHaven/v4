
import Vuex from 'vuex';
import store from './store/store';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
window.Vue = require('vue');

// Vue.use(Vuex);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding Components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('app-dashboard', require('./pages/AppDashboard.vue').default);
Vue.component('dashboard-layout', require('./pages/DashboardLayout.vue').default);

// const store = new Vuex.Store({
//   strict: true,
//   state: {
//     application: {}
//   },
//   getters: {
//     getField
//   },
//   mutations: {
//     updateField
//   }
// })


const app = new Vue({
  el: '#dashboard',
  data: {
    loading: true,
    routes
  },
  store,
});


