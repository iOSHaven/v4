
window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('search-results', require('./pages/SearchResults.vue').default);
Vue.component('dynamic-input', require('./components/DynamicInput.vue').default);
Vue.component('modal', require('./components/Modal.vue').default);

window.$vueapp = new Vue({
  el: '#vuescope',
  data: {
    searchinput: "",
    modal: {
      back: 'back',
      src: '',
      show: false,
    }
  },
  methods: {
    modalLoad(event, back="Back") {
      this.modal.src = event.target.href
      this.modal.back = back
      this.modal.show = true
      this.modal.title = event.target.dataset.title || ''
    },
    closeModal() {
      this.modal.show = false
      window.history.pushState({},"", window.$currentURL);
    }
  }
});

$(document).on('click', '.internal-link', function (e) {
  e.preventDefault();
  e.stopPropagation();
  // console.log(e.target)
  window.history.pushState({},"", e.target.href);
  window.$vueapp.modalLoad(e);
})
// const btn = document.querySelector('button.share');

// const resultPara = document.querySelector('.result');

// Must be triggered some kind of "user activation"
// btn.addEventListener('click', async () => {
//   const shareData = {
//     title: 'My Amazing Title', // Does not show
//     text: 'A subtitle',
//     url: 'https://example.com',
//   }
//   try {
//     await navigator.share(shareData)
//   } catch(err) {
//     alert(JSON.stringify(shareData))
//   }
// });

// $(window).unload(function() {
//   var scrollPosition = $('html').scrollTop();
//   localStorage.setItem("scrollPosition", scrollPosition);
// });
// if(localStorage.scrollPosition) {
//   $("html").scrollTop(localStorage.getItem("scrollPosition"));
// }


