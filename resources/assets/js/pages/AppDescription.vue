<template>
  

<div>
  <vue-simplemde v-model="application.description"></vue-simplemde>
</div>


</template>

<script>

import VueSimplemde from 'vue-simplemde';
import {mapFields} from 'vuex-map-fields';

export default {
  name: "AppDescription",
  components: {
    VueSimplemde
  },
  data () {
    return {
    }
  },
  computed: {
    ...mapFields([
      'application'
    ])
  }
}
</script>

<style lang="scss">
  @import "~simplemde/dist/simplemde.min.css";
</style>
