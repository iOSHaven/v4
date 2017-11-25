
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
const updateAppSearch = require('./updateAppSearch')

import Vuex from 'vuex'
import * as _store from './store/index'
const store = new Vuex.Store(_store)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('sidebar', require('./components/Sidebar.vue'));
Vue.component('square-button', require('./components/ui/SquareButton.vue'));
Vue.component('app-admin', require('./components/AppAdmin.vue'));
Vue.component('app', require('./components/App.vue'))
Vue.component('alert', require('./components/ui/Alert.vue'))
Vue.component('search-bar', require('./components/ui/SearchBar.vue'))
Vue.component('page-uid', require('./components/pages/uid.vue'))
Vue.component('page-apps', require('./components/pages/apps.vue'))
Vue.component('page-index', require('./components/pages/index.vue'))

const app = new Vue({
    el: '#app',
    store,
    methods: {
      updateAppSearch: updateAppSearch
    }
});



// $('document').ready(function () {
//   $('#loading').hide();
//   $('#app').css('opacity', '1');
// })
