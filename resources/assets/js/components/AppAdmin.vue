<template lang="html">
<div class="card flex">

<!-- P R E V I E W   M O D E -->
<square-button v-if="!auth.isEditing" label="edit" icon="fas fa-pencil" class="fill--blue" @click.native="edit"/>

<!-- E D I T   M O D E -->
<square-button v-if="auth.isEditing" label="done" icon="fas fa-check" class="fill--blue" @click.native="done"/>
<square-button v-if="auth.isEditing" label="add" icon="fas fa-plus" class="fill--blue" @click.native="add"/>
</div>
</template>

<script>
import SquareButton from './ui/SquareButton.vue'
export default {
  name: 'app-admin',
  components: {
    SquareButton
  },
  props: ['app'],
  computed: {
    auth () {
      return this.$store.getters.auth
    },
    // admin () {
    //   return this.$store.getters['admin/get']
    // },
    // apps () {
    //   return this.$store.getters['apps/get']
    // }
  },
  methods: {
    edit () {
      this.$store.dispatch('auth:edit')
    },
    done (exit = true) {
      if (this.app) {
        this.$store.commit('app:update', this.app)
        this.$store.commit('app:save')
      }
      if (exit) this.$store.dispatch('auth:edit')
    },
    add () {
      this.done(false)
      this.$store.dispatch('app:create')
      .then(() => {
        let uid = this.$store.getters['app:newest'].uid
        window.location.href = '/app/' + uid
      })
    }
  }
}
</script>

<style lang="scss" scoped="">

</style>
