<template>
  

<div>
  <label for="title">Name</label>
  <div class="flex items-center justify-center mb-4 relative border border-gray-300-light">
    <span class="input-icon p-3">
      <i class="fal fa-feather"></i>
    </span>
    <input v-model="application.name" class="w-full p-3 pl-5" type="text" placeholder="Name">
  </div>

  <label for="title">Version</label>
  <div class="flex items-center justify-center mb-4 relative border border-gray-300-light">
    <span class="input-icon p-3">
      <i class="fal fa-code-branch"></i>
    </span>
    <input v-model="application.version" class="w-full p-3 pl-5" type="text" placeholder="Version">
  </div>

  <label for="title">Short description</label>
  <div class="flex items-center justify-center mb-4 relative border border-gray-300-light">
    <span class="input-icon p-3">
      <i class="fal fa-feather"></i>
    </span>
    <input v-model="application.short" class="w-full p-3 pl-5" type="text" placeholder="Short description">
  </div>

  <label for="title">Size in bytes</label>
  <div class="flex items-center justify-center mb-4 relative border border-gray-300-light">
    <span class="input-icon p-3">
      <i class="fal fa-database"></i>
    </span>
    <input v-model="application.size" class="w-full p-3 pl-5" type="text" placeholder="Size in bytes">
  </div>


</div>


</template>

<script>

import {mapFields} from 'vuex-map-fields';

export default {
  name: "AppInformation",
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
