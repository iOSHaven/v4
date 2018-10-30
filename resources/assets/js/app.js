
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
Vue.component('announcement', require('./components/ui/Announcement.vue'))
Vue.component('drop-up', require('./components/ui/DropUp.vue'))
Vue.component('page-uid', require('./components/pages/uid.vue'))
Vue.component('page-apps', require('./components/pages/apps.vue'))
Vue.component('page-index', require('./components/pages/index.vue'))

const app = new Vue({
    el: '#app',
    store,
    data: {
      filteredApps: false,
      moreLoadedApps: [],
      page: 1
    },
    methods: {
      updateAppSearch (val) {
        $('.app.server-rendered').remove()
        this.filteredApps = val
      },
      loadMoreApps (page=null) {
        this.page ++
        var currentURL = window.location.pathname + window.location.search
        var params = ['json=true', 'page=' + this.page].join('&')
        var newURL = window.location.search ? currentURL + '&' + params : currentURL + '?' + params
        console.log(currentURL, params, newURL);
        axios.get(newURL).then(res => {
          var apps = res.data.apps.data
          var pag = res.data.apps
          Object.keys(apps).forEach(key => {
            this.moreLoadedApps.push(apps[key])
          })
          if (pag.current_page === pag.last_page) {
            $('#loadmoreapps').hide()
          }
          console.log(res.data.apps.current_page, res.data.apps.last_page,);
        })
      },
      toggleSidebar () {
        window.dispatchEvent(new Event('toggleSidebar'))
      }
    }
});


$("a").not('.get').not('#title').not('.noturl').click(function (event) {
  // if (!navigator.platform.match(/iPhone|iPod|iPad/)) return
  event.preventDefault();
  // event.stopPropagation()
  window.location = $(this).attr("href");
  // return false
})

$('document').ready(function () {
  $('.hide-on-server-render').show();
  if (!adsbygoogle.loaded) {
    $('.ad').addClass('blocked')
    $('.ad').html('<pre class="content">Please consider turning off your ad blocker. Ads help us bring you better content. \n\nThank you, 🙏\n\n- The iOS Haven team</pre>')
  }
})

$(document).ready(function() {

  // Check for click events on the navbar burger icon
  $(".navbar-burger").click(function() {
      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      $(".navbar-burger").toggleClass("is-active");
      $(".navbar-menu").toggleClass("is-active");
  });
});
