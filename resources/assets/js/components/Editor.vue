<template lang="html">
  <div class="Editor">
    <div class="" @mouseleave="save">
      <auto-resize v-for="(el, index) in els"
                v-model="el.content"
                @keydown.enter.native="createElement($event)"
                :id="'el-' + index"
                @changeType="changeType"
                @changeFocus="changeFocus"
                @remove="remove(index)"
                :classes="el.classes"
                :key="index"></auto-resize>
    </div>
  </div>
</template>

<script>
// import '~/static/autoresize.js'
import AutoResize from '~/components/ui/AutoResize'
function sleep (ms) {
  return new Promise(resolve => setTimeout(resolve, ms))
}
export default {
  components: {
    AutoResize
  },
  data () {
    return {
      id: -1,
      els: [],
      html: '',
      shifting: false,
      current: 0
    }
  },
  methods: {
    save () {
      this.html = ''
      this.els.forEach(el => {
        this.html += '<div class="'
        let classname = ''
        Object.keys(el.classes).forEach((key, index) => {
          if (el.classes[key]) classname += key + ' '
        })
        classname = classname.trim()
        this.html += classname
        this.html += '">' + el.content + '</div>'
      })
      let description = this.html
      let descriptionObject = JSON.stringify(this.els)
      this.$emit('save', {description, descriptionObject})
    },
    emptyElement () {
      this.id += 1
      return {
        type: 'paragraph',
        content: '',
        classes: {paragraph: true}
      }
    },
    createElement (e = null) {
      if (e.preventDefault && !this.shifting) {
        e.preventDefault()
        let el = this.emptyElement()
        let prev = document.activeElement
        let _id = parseInt(prev.id.split('-')[1]) + 1
        this.els.splice(_id, 0, el)
        // console.log(_id)
        // this.els.push(el)
        // console.log(_id)
        window.dispatchEvent(new Event('click'))
        this.focus(_id)
      } else if (e === 'force') {
        this.els.push(this.emptyElement())
        // this.focus(0)
      }
    },
    focus: async function (id) {
      await sleep(1)
      let el = document.getElementById('el-' + id)
      // console.log('el-' + id, el)
      el.focus()
    },
    toggleShift (e) {
      if (e.key.toLowerCase() !== 'shift') return
      this.shifting = !this.shifting
    },
    changeFocus (id) {
      this.current = this.els[id - 1]
    },
    remove (index) {
      if (this.els.length > 1) this.els.splice(index, 1)
    },
    changeType (type) {
      this.current.classes[type] = !this.current.classes[type]
      switch (type) {
        case 'heading':
          this.current.type = 'heading'
          this.current.classes[type] = true
          this.current.classes['paragraph'] = false
          this.current.classes['list'] = false
          break
        case 'paragraph':
          this.current.type = 'paragraph'
          this.current.classes[type] = true
          this.current.classes['heading'] = false
          this.current.classes['list'] = false
          break
        case 'list':
          this.current.type = 'list'
          this.current.classes[type] = true
          this.current.classes['heading'] = false
          this.current.classes['paragraph'] = false
          break
      }
    }
  },
  mounted () {
    this.createElement('force')
    document.addEventListener('keydown', this.toggleShift)
    document.addEventListener('keyup', this.toggleShift)
    // window.onload = () => {
    //   let textarea = document.querySelector('textarea')
    //   textarea.addEventListener('keydown', this.resizeTextarea)
    // }

    // this.resizeTextarea()
  }
}
</script>

<style lang="scss" scoped="">

</style>
