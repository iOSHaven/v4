<template>
  <div>
    <div id="particles-js"></div>
  </div>
</template>

<script>
export default {
  name: "Particles",
  mounted () {
    window.onload = function () {
      var now = new Date();
      if (now.getMonth() === 11 && now.getDate() === 25) {
        window.particlesJS.load('particles-js', '/particlesjs-christmas.json')
      }
      else if (now.getMonth() === 11) {
        window.particlesJS.load('particles-js', '/particlesjs-winter.json')
      }
      else {
        window.particlesJS.load('particles-js', '/particles-js.json')
      }

    }
  }
}
</script>

<style lang="scss" scoped>
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
