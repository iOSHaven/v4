<template>
  <div class="fixed top-0 left-0 right-0 bottom-0 z-2 flex flex-col" v-show="shouldShow">
      <div :class="'flex items-center p-inset-top '  + topclass">
          <div style="height: 33px" class="flex items-center">
            <button @click="close" class="px-3 text-blue-light text-left self-start py-1">
                    <i class="fal fa-chevron-left mr-1"></i>
                    {{ back }}
            </button>
          </div>
      </div>
      <!-- <div style="height: 33px" :class="'flex flex-col justify-center p-inset-top ' + topclass">
          <button @click="close" class="px-3 text-blue-light text-left self-start py-1">
            <i class="fal fa-chevron-left mr-1"></i>
              {{ back }}
        </button>
        <div class="self-center absolute">{{ title }}</div>
      </div>
        
        <div class="flex flex-grow justify-center pt-24" v-show="!loaded">
            <div>
                <i class="fas fa-spinner-third fa-spin fa-3x"></i>
            </div>
        </div> -->
        <div ref="content" class="flex-grow overflow-auto"> </div>
        
    </div>
</template>

<script>
export default {
    props: ['back', 'src', 'show', 'id', 'topclass', 'title'],
    data () {
        return {
            shouldShow: false,
            loaded: false,
        }
    },
    methods: {
        overflow() {
            document.body.style.overflow = this.show ? 'hidden' : "scroll";
        },
        close() {
            // this.shouldShow = false;
            this.$emit('closed', false);
        },
        doneLoading() {
            this.loaded = true
        }
    },
    mounted () {
        this.shouldShow = this.show
        this.overflow()
    },
    watch: {
        show (val) {
            this.shouldShow = this.show
            this.overflow()
        },
        src (val) {
            this.loaded = false
            console.log('change', val)
            getJSON(val, (err, doc) => {
                if (err || typeof doc.body == "undefined") {
                    this.$refs.content.innerHTML = "Not Found"
                } else {
                    this.$refs.content.innerHTML = doc.body.querySelector('#content').innerHTML
                }
                this.loaded = true
            }, "document")
        }
    }
}
</script>

<style>

</style>