// import Vue from 'vue'
// window.Vue = require('vue');
import {createApp, createSSRApp, h} from 'vue';
import SearchResults from "./pages/SearchResults.vue";
import DynamicInput from "./components/DynamicInput.vue";


window.app = createApp({
  el: '#vue-scope',
  data() {
    return {
      searchinput: ""
    }
  },
  components: {
    SearchResults
  },
  mounted() {
    console.log("Hello vue")
  }
})

app.component('SearchResults', SearchResults.default);
app.component('DynamicInput', DynamicInput);

app.mount("#vue-scope")


