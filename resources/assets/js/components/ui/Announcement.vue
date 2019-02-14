<template>
  <a class="announcement" v-if="show" :href="link || ''">
    {{message}}
    <i class="fal fa-times close" @click.stop.prevent="closebanner"></i>
  </a>
</template>

<script>
export default {
  name: "Announcement",
  props: ['message', 'link', 'session'],
  data () {
    return {
      show: true
    }
  },
  methods: {
    gotolink () {
      window.setTimeout(function () {
        window.location = this.link
      }, 10)
    },
    closebanner (e) {
      e.preventDefault()
      console.log(e);
      this.show = false
      axios.post('/close_announcement');
    }
  }
}
</script>

<style lang="scss" scoped="">
.close {
  padding: 1rem;
  border-radius: 50rem;
  &:hover, &:focus {
    background: rgba(0,0,0,0.05);
    cursor: pointer;
  }
}
.announcement {
  background: #ffdfdf;
  color: #F44336;
  border: 1px solid;
  width: 100%;
  padding: 1rem;
  box-shadow: 0px 4px 2px -2px rgba(0,0,0,0.25);
  display: flex;
  align-items: center;
  justify-content: space-between;
  text-decoration: none;
}
</style>
