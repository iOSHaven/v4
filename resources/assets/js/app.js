
window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('search-results', require('./pages/SearchResults.vue').default);
Vue.component('dynamic-input', require('./components/DynamicInput.vue').default);

const app = new Vue({
  el: '#vuescope',
  data: {
    searchinput: ""
  }
});

const btn = document.querySelector('button.share');

// const resultPara = document.querySelector('.result');

// Must be triggered some kind of "user activation"
btn.addEventListener('click', async () => {
  const shareData = {
    title: '5 things',
    text: 'Story on iOS Haven',
    url: 'https://ioshaven.com/today/someurl',
  }
  try {
    await navigator.share(shareData)
  } catch(err) {
    alert('failed')
  }
  alert('shared!!')
});
