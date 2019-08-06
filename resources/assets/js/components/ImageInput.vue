<template>
  <div :style="{width: width + 'px', height: height + 'px'}">
    <div :style="{display: 'inline-block', position:'relative', width: width + 'px', height: height + 'px'}">
      <label for="image-input" style="position:absolute; top:0; left: 0; right: 0; bottom: 0; z-index: 4; cursor: pointer" 
      @mouseover="setOverlay(true)" @mouseleave="setOverlay(false)"></label>
      <div v-show="showOverlay" style="position:absolute; top:0; left: 0; right: 0; bottom: 0; display: flex; align-items: center; justify-content: center; background: rgba(0,0,0,0.3); z-index:3">
        <i class="fas fa-camera fa-2x" style="opacity: 0.9; color: white"></i>
      </div>
      <input type="file" name="image-input" id="image-input" @change="onFileSelected" style="display: none">
      <canvas ref="canvas" :width="width" :height="height" style="position:absolute; top:0; left: 0; right: 0; bottom: 0; z-index: 2;"></canvas>
      <img v-show="src && showImg" :src="src" :width="width" :height="height" style="position:absolute; top:0; left: 0; right: 0; bottom: 0; z-index: 1;" alt="">
    </div>
  </div>
</template>

<script>
export default {
  name: "ImageInput",
  props: {
    width: {
      type: Number,
      default: 100
    },
    height: {
      type: Number,
      default: 100
    },
    src: {
      default: ""
    }
  },
  data () {
    return {
      canvas: null,
      selectedFile: null,
      ctx: null,
      img: null,
      showOverlay: false,
      showImg: true
    }
  },
  mounted () {
    this.canvas = this.$refs.canvas;
    this.ctx = this.canvas.getContext('2d');
    console.log("mounted")
  },
  methods: {
    setOverlay(value) {
      this.showOverlay = value
    },
    setImage(src) {
      this.img = new Image;
      this.img.onload = this.onImageLoad;
      this.img.src = src;
    },
    onFileSelected(e) {
      this.selectedFile = e.target.files[0];
      var reader = new FileReader();
      reader.onload = this.onFileReaderLoad;
      reader.readAsDataURL(this.selectedFile);
    },
    onFileReaderLoad (e) {
      this.setImage(e.target.result)
    },
    onImageLoad(e) {
      this.draw(0, 0);
    },
    draw(x,y) {
      this.showImg = false
      this.ctx.clearRect(0,0, this.width, this.height);
      var imageAspectRatio = this.img.width / this.img.height
      var newWidth = this.width
      var newHeight = newWidth / imageAspectRatio
      if (newHeight > this.height) {
        newHeight = this.height
        newWidth = newHeight * imageAspectRatio
      }
      this.ctx.drawImage(this.img, x, y, newWidth, newHeight);
    }
  }
}
</script>

