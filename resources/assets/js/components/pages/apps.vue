<template>
  <div class="apps wrapper">
    <app-admin v-if="auth.isAdmin" class="m-3"/>

    <div class="card m-3">
      <search-bar :options="searchOptions" :data="apps" class="fancy" @update="updateSearch" ref="search"/>
    </div>


    <div v-if="auth.isAdmin">
      <app v-for="app in filteredApps" :key="app.name" :data="app" class="m-3" @removed="appRemoved"></app>
    </div>
    

    <!-- <div class="card m-3 mt2 fill-blue center">Load more apps.</div> -->
  </div>
</template>

<script>
import App from '../App.vue'
import AppAdmin from '../AppAdmin.vue'
import SearchBar from '../ui/SearchBar.vue'

export default {
  middleware: ['authenticate', 'apps'],
  props: ['json'],
  name: 'page-apps',
  data () {
    return {
      filteredApps: [],
      searchOptions: {
        alphabetize: 'name',
        property: 'name',
        label: 'Search for apps...',
        filterOnMount: true
      }
    }
  },
  computed: {
    auth () {
      return this.$store.getters.auth
    },
    apps () {
      return this.$store.getters['app:get']
    }
  },
  mounted () {
    this.$store.commit('auth:set', this.json)
    axios.get('/apps/getJson/').then(({data}) => {
      console.log(data);
      this.filteredApps = data
      this.$store.commit('app:set', data)
    })
  },
  components: {
    App,
    AppAdmin,
    SearchBar
  },
  methods: {
    updateSearch (val) {
      //console.log('asdfasf',val);
      this.filteredApps = val
    },
    appRemoved (uid) {
      //console.log(uid);
      let i = this.filteredApps.findIndex(el => {
        return el.uid === uid
      })
      //console.log(i);
      this.filteredApps.splice(i, 1)
      let search = this.$refs.search
      search.filter()
      // console.log(search)
      // this.updateSearch(this.filteredApps)
    }
  }
}
</script>

<style lang="scss" scoped="">
.apps {
  display: flex;
  flex-wrap: wrap;
  flex-basis: 1;
}
</style>
