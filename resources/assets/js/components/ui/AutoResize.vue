<template lang="html">
  <div class="w" @mouseleave="defocus">
    <div class="bars" @click="toggleMenu">
      <i class="fal fa-bars" v-show="focused"></i>
      <i :class="{'fal':true,
      'fa-paragraph': type === 'paragraph',
      'fa-heading': type === 'heading',
      'fa-list': type === 'list'}" v-show="!focused"></i>
    </div>
    <div class="addpadding" @click="focus">
      <div class="menu" v-show="menuIsVisible && focused" @mouseleave="defocusMenu">
        <div class="item" @click="changeType('heading')">
          <i class="far fa-heading"></i>
        </div>
        <div class="item" @click="changeType('paragraph')">
          <i class="far fa-paragraph"></i>
        </div>
        <div class="item" @click="changeType('list')">
          <i class="far fa-list"></i>
        </div>
        <div class="item empty">
          <!-- empty don't remove -->
        </div>
        <div class="item" @click="changeType('bold')">
          <i class="far fa-bold"></i>
        </div>
        <div class="item" @click="changeType('strikethrough')">
          <i class="far fa-strikethrough"></i>
        </div>
        <div class="item" @click="changeType('italic')">
          <i class="far fa-italic"></i>
        </div>
        <div class="item empty">
          <!-- empty don't remove -->
        </div>
        <div class="item" @click="remove">
          <i class="far fa-trash"></i>
        </div>
      </div>



      <div class="textarea-wrapper" :class="classes">
        <textarea rows="1" :value="value" @input="$emit('input', $event.target.value)" @keydown="resize($event)" ref="area" :id="id" :class="classes"></textarea>
      </div>
    </div>
  </div>

</template>

<script>
function sleep (ms) {
  return new Promise(resolve => setTimeout(resolve, ms))
}
export default {
  props: ['value', 'id', 'classes'],
  data () {
    return {
      focused: false,
      menuIsVisible: false,
      type: 'paragraph'
    }
  },
  computed: {
    line () {
      return parseInt(this.id.split('-')[1]) + 1
    }
  },
  methods: {
    toggleMenu () {
      this.menuIsVisible = !this.menuIsVisible
    },
    focus () {
      this.focused = true
      this.$refs.area.focus()
      this.$emit('changeFocus', this.line)
    },
    defocusMenu () {
      this.menuIsVisible = false
    },
    defocus () {
      this.menuIsVisible = false
      this.focused = false
    },
    remove () {
      this.menuIsVisible = false
      this.$emit('remove')
    },
    async resize (e) {
      let el = this.$refs.area
      await sleep(1)
      el.style.height = '0px'
      // el.style.width = '0px'
      // el.style.width = el.scrollWidth + 60 + 'px'
      el.style.height = el.scrollHeight + 'px'
      el.parentElement.style.height = el.scrollHeight - 30 + 'px'
    },
    async changeType (val) {
      this.toggleMenu()
      if (val === 'heading' || val === 'paragraph' || val === 'list') this.type = val
      this.$emit('changeType', val)
      await sleep(10)
      this.resize()
    }
  },
  mounted () {
    this.resize()
    // this.focus()
  }
}
</script>

<style lang="scss" scoped="">
.w {
  display: flex;
  align-items: center;
  margin-bottom: 1rem;
  border: 1px solid #ccc;
}
.menu {
    background: black;
    color: white;
    display: flex;
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    align-items: center;
    padding: 1rem;
    z-index: 2;
}
.item {
  padding: 0.5rem;
  margin: 0.3rem;
  width: 2.5rem;
  text-align: center;
  border: 1px solid #aaa;
  &:hover:not(.empty) {
    background: rgba(255,255,255,0.3);
    cursor: pointer
  }
  &.empty {
    border: none;
    width: 0.2rem;
  }
}
.bars {
  font-size: 1rem;
  opacity: 0.4;
  // margin-right: 1rem;
  width: 1rem;
  cursor: pointer;
  padding: 1rem;
  padding-right: 2rem;
}
.addpadding {
  padding: 1rem;
  flex-grow: 1;
  position: relative;
  border-left: 1px solid #ccc;
  background: rgba(0,0,0,0.05);
  &:focus-within {
    background: rgba(0,0,0,0.05);
  }
}
.textarea-wrapper {
  position: relative;
  &.list {
    left: 1rem;
  }
  &.list:after {
    content: "";
    display: list-item;
    position: absolute;
    top: -0.2rem;
    left: 0.4rem;
    font-size: 1.3rem;
  }
}
textarea {
  resize: none;
  font-size: 16px;
  overflow: hidden;
  border: none;
  outline: none;
  margin-left: -30px;
  padding: 0 30px 30px;
  background: transparent;
  position: absolute;
  width: 100%;
}
</style>
