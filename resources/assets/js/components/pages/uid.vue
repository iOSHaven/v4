<template lang="html">
  <div class="wrapper">
    <app-admin v-if="!!auth.isAdmin" :app="app"/>

    <div class="card" v-if="!!auth.isEditing">
      <div class="field">
        <div class="h5 mb-5">Name</div>
        <input type="text" v-model="app.name" class="fancy" maxlength="255" placeholder="Clash of clans">
      </div>
      <div class="field">
        <div class="h5 mb-5">Version</div>
        <input type="text" v-model="app.version" class="fancy" maxlength="12" placeholder="1.0.321">
      </div>
      <div class="field">
        <div class="h5 mb-5">Size (in bytes)</div>
        <input type="text" v-model.number="app.size" class="fancy" maxlength="20" placeholder="6520000 (1 million = 1MB)">
      </div>
      <div class="field">
        <div class="h5 mb-5">Icon</div>
        <input type="text" v-model="app.icon" class="fancy" maxlength="255" placeholder="icons/image.png">
      </div>
      <div class="field">
        <div class="h5 mb-5">Banner</div>
        <input type="text" v-model="app.banner" class="fancy" maxlength="255" placeholder="banners/image.png">
      </div>
      <div class="field">
        <div class="h5 mb-5">Short Description (max: 18)</div>
        <input type="text" v-model="app.short" class="fancy" maxlength="18" placeholder="a short snippet">
      </div>
      <div class="field">
        <div class="h5 mb-5">Description <a href="http://commonmark.org/help/">Markdown Guide</a> </div>
        <textarea rows="8" v-model="app.description" class="fancy" maxlength="65000" placeholder="Use markdown!! No HTML!!"></textarea>
        <!-- <editor @save="saveDescription"/> -->
      </div>
      <div class="field">
        <div class="h5 mb-5">Unsigned</div>
        <input type="text" v-model="app.unsigned" class="fancy" maxlength="255" placeholder="https://example.com/your/unsigned/app/download">
      </div>
      <div class="field">
        <div class="h5 mb-5">Signed</div>
        <input type="text" v-model="app.signed" class="fancy" maxlength="255" placeholder="https://example.com/your/signed/app/download">
      </div>
      <div class="field">
        <div class="h5 mb-5">Unsigned Premium</div>
        <input type="text" v-model="app.unsigned_premium" class="fancy" maxlength="255" placeholder="https://example.com/premium/unsigned/app/download">
      </div>
      <div class="field">
        <div class="h5 mb-5">Signed Premium</div>
        <input type="text" v-model="app.signed_premium" class="fancy" maxlength="255" placeholder="https://example.com/premium/signed/app/download">
      </div>
      <div class="field">
        <div class="h5 mb-5">Tags</div>
        <input type="text" v-model="app.tags" class="fancy" maxlength="255" placeholder="game, fun, free, cats">
      </div>
    </div>


    <div class="card" v-if="!auth.editing">
      <div class="markdown" v-html="descriptionHTML"></div>
    </div>
    <div class="card flex tags" v-if="app.tags">
      <div class="tag" v-for="tag in tags">{{tag}}</div>
    </div>

  </div>
</template>

<script>
// import Editor from '~/components/Editor.vue'
import SquareButton from '../ui/SquareButton'
import AppAdmin from '../AppAdmin.vue'
import marked from 'marked'
export default {
  name: 'page-uid',
  props: ['setAuth', 'uid'],
  components: {
    SquareButton,
    AppAdmin
  },
  data () {
    return {
      app: {}
    }
  },
  mounted () {
    this.$store.commit('auth:set', this.setAuth)
    this.$store.commit('app:uid', this.uid)
    axios.get('/apps/getJson/' + this.uid).then(({data}) => {
      //console.log(data);
      this.$store.commit('app:set', data)
      // let data = this.$store.getters['app:get']
      this.app = data
    })
  },
  computed: {
    auth () {
      return this.$store.getters.auth
    },
    descriptionHTML () {
      marked.setOptions({
        sanitize: true,
        smartypants: true
      })
      return marked(this.app.description || '')
    },
    api () {
      return config.env.api
    },
    tags () {
      return (this.app.tags) ? this.app.tags.split(',') : []
    }
  }
}
</script>

<style lang="scss" scoped="">
// .uidpage {
//   @media (max-width: 500px) {
//     margin-top: -2rem;
//   }
// }
// .banner {
//     background: rebeccapurple;
//     height: 100vh;
//     max-height: 250px;
//     position: relative;
//     overflow: hidden;
//     background-repeat: no-repeat;
//     background-position: center;
//     background-size: cover;
// }
// .icon {
//     padding: 2.5rem;
//     position: absolute;
//     top: 1rem;
//     left: 1rem;
//     z-index: 1;
//     border: 1px solid white;
//     border-radius: 1rem;
//     background-position: center;
//     background-size: cover;
// }
// .get {
//     min-width: 7rem !important;
//     font-size: 0.8rem;
//     padding: 0.5rem;
//     border-radius: 5rem;
//     text-transform: uppercase;
//     display: inline-block;
//     margin-left: 0.5rem;
//     &:first-of-type {
//       margin-left: 0;
//     }
// }
// .title {
//   font-weight: bold;
//   margin: 0 0.5rem;
// }
// .installs, .title, .info {
//     padding: 0.5rem 0;
// }
// .bar {
//     justify-content: space-between;
//     align-items: center;
//     flex-wrap: wrap;
//     justify-content: space-between;
//     @media (max-width: 500px) {
//       justify-content: center;
//     }
// }
// .info {
//     margin: 0 0.5rem;
//     text-align: center;
// }
// .installs {
//     position: absolute;
//     bottom: 0;
//     right: 0;
//     padding: 1rem;
//     width: 100vw;
//     text-align: right;
//     z-index: 1;
// }
// .data {
//     text-transform: uppercase;
//     display: inline-block;
//     padding: 0.8rem;
//     margin: 0;
//     text-align: center;
//     width: 5rem;
//     margin: 0 0.3rem;
//     > * {
//       width: 100%;
//       text-align: center;
//     }
//     .number {
//       font-weight: 700;
//       font-size: 0.9rem;
//     }
//     .label {
//       font-size: 0.54rem;
//       margin-top: 0.3rem;
//     }
// }
//
// .shadow {
//     position: absolute;
//     bottom: -2rem;
//     right: -2rem;
//     height: 5rem;
//     width: 200vw;
//     background: rgba(0, 0, 0, 0.67);
//     filter: blur(2rem);
//     z-index: 0;
// }
// .tags {
//     flex-wrap: wrap;
//     justify-content: space-around;
// }
// .tag {
//     padding: 0.3rem 1rem;
//     border: 1px solid #ccc;
//     margin: 0.3rem;
//     border-radius: 50rem;
//     flex-grow: 1;
//     text-align: center;
// }
</style>
