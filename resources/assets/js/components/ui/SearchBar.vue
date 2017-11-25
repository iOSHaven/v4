<template lang="html">
  <div class="searchbar">
    <input v-model="payload" @keyup="filter" :placeholder="searchOptions.label" :class="className">
    <i :class="'searchbar-button ' + searchOptions.button" v-if="searchOptions.button" @click="toggle"></i>
    <div class="backdrop" v-if="showDropUp" @click="toggle"></div>
    <drop-up v-show="showDropUp" @close="toggle">

      <div class="item" @click="sort($event, {name:'downloads', alphabetize:'downloads', property:'name'})">
        <i class="icon"></i>Downloads
      </div>
      <div class="item active" @click="sort($event, {name:'name', alphabetize:'name', property:'name'})">
        <i class="icon fal fa-sort-amount-down"></i>Name
      </div>
      <div class="item" @click="sort($event, {name:'size', alphabetize:'size', property:'name'})">
        <i class="icon"></i>Size
      </div>
      <div class="item" @click="sort($event, {name:'tags', alphabetize:'name', property:'tags'})">
        <i class="icon"></i>Tags
      </div>
      <div class="item" @click="sort($event, {name:'views', alphabetize:'views', property:'name'})">
        <i class="icon"></i>Views
      </div>

    </drop-up>
  </div>

</template>

<script>
export default {
  name: 'search-bar',
  props: ['data', 'options', 'inputclass', 'className'],
  data () {
    return {
      'searchOptions': {},
      showDropUp: true,
      payload: '',
      result: [],
      orderType: {
        name: 'name',
        type: 'down'
      },
    }
  },
  mounted () {
    this.searchOptions = this.options
    if (this.searchOptions.filterOnMount) this.filter()
  },
  methods: {
    filter () {
      /**
       * @param {String} alphabetize - the property being alphabetized
       * @param {String} property - the property being searched
      */
      console.log('filter')
      this.result = []
      if (this.searchOptions.alphabetize) this.alphabetize(this.data)
      if (this.searchOptions.property) this.search({payload: this.payload, data: this.result || this.data})
      if (this.orderType.type === "up") this.result.reverse()
      this.$emit('update', this.result)
    },
    toggle () {
      this.showDropUp = !this.showDropUp
    },
    sort (e, options) {
      $('.DropUp .item').removeClass('active')
      $('.DropUp .item .icon').removeClass('fal fa-sort-amount-down fa-sort-amount-up')
      $(e.target).addClass('active')
      if (options.name !== this.orderType.name) {
        this.orderType.name = options.name
        this.orderType.type = 'down'
      } else {
        this.orderType.type = (this.orderType.type === 'down') ? 'up' : 'down'
      }
      this.searchOptions.alphabetize = options.alphabetize
      this.searchOptions.property = options.property
      console.log('sdfg', this.searchOptions.property);
      $(e.target).find('.icon')[0].className = "icon fal fa-sort-amount-" + this.orderType.type
      this.filter()
    },
    alphabetize (data) {
      let $a = this.searchOptions.alphabetize
      let alphabetize = Object.keys(data).sort((a, b) => {
        let res
        if (typeof data[a][$a] === 'string') {
          return data[a][$a].toLowerCase().localeCompare(data[b][$a].toLowerCase())
        }
        else if (typeof data[a][$a] === 'number') {
          return data[a][$a] - data[b][$a]
        }
      })
      console.log(data, alphabetize);
      alphabetize.forEach(index => {
        this.result.push(data[index])
      })
    },
    search (args) {
      let $p = this.searchOptions.property
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

<style lang="scss" scoped>
.searchbar {
  position: relative;
}
.searchbar-button {
  position: absolute;
  right: 1rem;
  height: 100%;
  top: 0;
  display: flex;
  align-items: center;
  color: #ccc;
  &:hover {
    cursor: pointer;
    color: darken(#ccc, 15%);
  }
}

</style>
