<template lang="html">
  <div>
    <div id="particles-js"></div>
  </div>
</template>

<script>
export default {
  mounted () {
    window.onload = function () {
      window.particlesJS.load('particles-js', '/particlesjs-christmas.json')
    }
  }
}
</script>
<style lang="css" scoped>
 #particles-js {
   background-color: #21b7d7;
   position: fixed;
   width: 100%;
   height: 100%;
   z-index: -1;
   top: 0px;
   left: 0px;
 }
 canvas {
   width: 100%;
   height: 100%;
 }
</style>
