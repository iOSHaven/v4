<template lang="html">
  <a class="card flex p-5 app" @click="openApp($event)">
    <div ref="image" class="image" :style="{'background-image': `url('/${data.icon}')`}"></div>
    <div class="content">
      <h3 class="mb-3"><strong>{{data.name}}</strong></h3>
      <div class="shadow"></div>
      <div class="description">{{data.short}}</div>
    </div>
    <div class="get fill--blue center">get</div>
  </a>
</template>

<script>
export default {
  props: ['data'],
  computed: {
    auth () {
      return this.$store.getters.auth
    },
    page () {
      return '/app/' + this.data.uid
    }
  },
  methods: {
    remove (e) {
      // prevent default so it doesn't take you to the app page.
      e.preventDefault()
      this.$store.commit('app:remove', {
        uid: this.data.uid
      })
      this.$emit('removed')
    },
    openApp (e) {
      e.preventDefault();
      window.location = this.page
    }
  }
}
</script>

<style lang="scss" scoped="">
.content {
  overflow: hidden;
  flex-grow: 1;
  margin-left: 0.5rem;
  align-self: flex-start;
  font-size: 0.8rem;
}
.get {
    min-width: 3.2rem !important;
    font-size: 0.6rem;
    padding: 0.3rem;
    border-radius: 5rem;
    text-transform: uppercase;
}
.description{
  font-size: .8rem;
  height: 2.5rem;
}
.shadow {
    box-shadow: 0px -5px 11px 12px white;
    position: absolute;
    width: 100%;
    left: 5.5rem;
    top: 100%;
}
.image {
  width: 0;
  height: 0;
  padding: 2rem;
  background-position: center;
  background-size: contain;
  background-repeat: no-repeat;
}
</style>
