Nova.booting((Vue, router, store) => {
  Vue.component('index-plist', require('./components/IndexField'))
  Vue.component('detail-plist', require('./components/DetailField'))
  Vue.component('form-plist', require('./components/FormField'))
})
