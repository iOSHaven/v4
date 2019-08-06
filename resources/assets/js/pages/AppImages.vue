<template>
  

<div>
  <image-input
    :width="100"
    :height="100"
    :src="application.icon"
  ></image-input>


</div>


</template>

<script>

import ImageInput from "../components/ImageInput";
import {mapFields} from 'vuex-map-fields';


export default {
  name: "AppImages",
  components: {
    ImageInput,
  },
  data () {
    return {
      
    }
  },
  computed: {
    ...mapFields([
      'application'
    ])
  },

}
</script>
