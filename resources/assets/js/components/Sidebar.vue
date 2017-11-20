<template lang="html">
  <div class="Sidebar">
    <div id="backdrop"  v-if="isVisible" v-on:click="toggle"></div>
    <div href="/" id="bar">
        <a href="/" id="title">{{title}}</a>
        <div id="links">
          <slot name="links">
            <square-button icon="fas fa-question" class="fill--white dark"/>
          </slot>
          <square-button icon="fas fa-bars" class="fill--white dark" @click.native="toggle"/>
        </div>
    </div>

    <div :style="{'background-color': color}" :class="{'menu': true, 'visible': isVisible, 'translate':!isVisible}">
      <div class="toggle" v-on:click="toggle">
        CLOSE <i class="fal fa-times"></i>
      </div>

      <slot name="content">
        please put content in me.
      </slot>
    </div>
  </div>
</template>

<script>
import SquareButton from './ui/SquareButton.vue'
export default {
  props: ['color', 'title'],
  components: {
    SquareButton
  },
  data () {
    return {
      isVisible: false
    }
  },
  mounted () {
    window.addEventListener('toggleSidebar', () => {
      this.isVisible = !this.isVisible
    }, false)
  },
  methods: {
    toggle () {
      window.dispatchEvent(new Event('toggleSidebar'))
    }
  },
  watch: {
    visible () {
      this.isVisible = this.visible
    }
  }
}
</script>

<style lang="scss" scoped>
.toggle {
    color: inherit;
    font-size: 0.7rem;
    line-height: 2rem;
    text-align: right;
    padding: 1rem 4rem;
    position: absolute;
    top: 0;
    right: 0;
    color: inherit;
    cursor: pointer;
    display: flex;
    align-items: center;
    i {
      font-size: 1.5rem;
      margin-left: 0.3rem;
      margin-top: -0.1rem;
    }
}
#backdrop{
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 101;
}
#links {
    margin-top: 0.2rem;
}
#bar {
    background: #141a1d;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    padding: 0.5rem 1rem;
    color: white;
    font-size: 1.2rem !important;
    text-decoration: none;
    z-index: 100;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}

#title {
  padding: 0.5rem 0;
  border-color: transparent;
  float: left;
  margin-right: 1rem;
  color: white;
  text-decoration: none;
  &:hover {
    // border-bottom: 1px solid white;
    text-decoration: underline;
  }
}
.menu {
    position: fixed;
    top: 0;
    padding: 4rem 2rem 2rem;
    box-sizing: border-box;
    z-index: 101;
    color: white;
    right: -15rem;
}
.menu.hidden{
  width: auto;
  right: 0;
  padding: 0;
  background-color: transparent !important;
  .toggle {
    position: relative;
    padding: 1rem 2rem;
  }
}

.menu.translate{
  bottom: 0;
  right: -400px;
  opacity: 0;
  transition: all 0.5s;
}
.menu.visible{
  bottom: 0;
  width: 400px;
  right: -3rem;
  overflow-y: scroll;
  transition: right 0.5s;
  opacity: 1;
  @media screen and (max-width: 575px){
    width: 350px;
  }
}

.item {
    padding: 1rem;
    color: inherit;
    font-size: 1.2rem;
    border-bottom: 1px solid;
    text-transform: uppercase;
    display: block;
    text-decoration: none;
}
.item:last-child {
  border-bottom: none;
}
.item:hover{
  background: rgba(0, 0, 0, 0.2);
  cursor: pointer;
}

.item > svg, .item > i {
  margin-right: 1rem
}

#links > * {
  display: inline-block;
}

</style>
