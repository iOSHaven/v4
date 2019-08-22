<template>
  <div class="">
      
      <slot name="content"></slot>
      <div class="hidden" ref="inputtemplate">
          <slot name="template"></slot>
      </div>
      <div v-for="n in count" :key="n" v-html="rendertemp(n)">
      </div>
      <div class="text-center">
        <a v-if="!hide" @click.prevent="increment" class="font-bold rounded-full text-sm mr-1 px-5 py-1 text-white-light bg-blue-light">{{this.text}}</a>
      </div>
      
      <input type="hidden" :name="this.name + '_count'" :value="this.count + this.start">
      <input type="hidden" :name="this.name + '_start'" :value="this.count + this.start">
  </div>
</template>

<script>
export default {
    props: {
        start: {
            default: 0
        },
        text: {
            default: "Add"
        },
        name: {
            default: "dynamic_input"
        }
    },
    data () {
        return {
            count: 0,
            hide: false,
        }
    },
    mounted () {
        console.log(this.$refs.inputtemplate.innerHTML)
        // this.$refs.inputtemplate
    },
    methods: {
        increment () {
            this.count += 1
        },
        rendertemp (id) {
            var html = this.$refs.inputtemplate.innerHTML.split("==REPLACE==").join(id + this.start)
            this.hide = true
            return html
        }
    }
}
</script>

<style>

</style>