<template lang="html">
    <input v-model="payload" @keyup="filter" :placeholder="options.label">
</template>

<script>
export default {
  name: 'search-bar',
  props: ['data', 'options', 'inputclass'],
  data () {
    return {
      payload: '',
      result: []
    }
  },
  mounted () {
    if (this.options.filterOnMount) this.filter()
  },
  methods: {
    filter () {
      /**
       * @param {String} alphabetize - the property being alphabetized
       * @param {String} property - the property being searched
      */
      console.log('filter')
      this.result = []
      if (this.options.alphabetize) this.alphabetize(this.data)
      if (this.options.property) this.search({payload: this.payload, data: this.result || this.data})
      this.$emit('update', this.result)
    },
    alphabetize (data) {
      let $a = this.options.alphabetize
      let alphabetize = Object.keys(data).sort((a, b) => {
        return data[a][$a].toLowerCase().localeCompare(data[b][$a].toLowerCase())
      })
      alphabetize.forEach(index => {
        this.result.push(data[index])
      })
    },
    search (args) {
      let $p = this.options.property
      let $payload = args.payload.toLowerCase()

      let search = args.data.filter(d => {
        let found = false
        if (typeof d[$p] === 'string' || typeof d[$p] === 'number') {
          let $target = d[$p].toLowerCase()
          if ($target.includes($payload)) found = true
        } else if (Array.isArray(d[$p])) {
          d[$p].forEach(item => {
            if (item.toLowerCase().includes($payload)) found = true
          })
        }
        return found
        // return false
      })

      this.result = search
    }
  }
}
</script>

<style lang="css">
</style>
