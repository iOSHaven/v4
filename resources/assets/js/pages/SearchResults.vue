<template>
  <ul class="mt-3" v-if="input">
        <!-- Search result -->
        <h1>Search results</h1>
        <li :key="app.uid" v-for="app in filteredApps" :class="['flex', 'items-center', 'justify-between', t('border-gray-200'), 'border-b', 'no-border-on-last']">
            <a :href="`/${app.type}/${app.uid}`" class="w-full flex items-center justify-start overflow-hidden py-3">
                <img class="rounded-lg mr-3" :src="app.icon" alt="" height="40" width="40">
                <div>
                    <div v-html="highlight(app.name)"></div>
                    <div v-html="highlight(app.short)"></div>
                </div>
            </a>
            <div class="-ml-4">
                <i :class="['fal', 'fa-chevron-right', 'fa-2x', t('text-gray-400')]"></i>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    props: ["theme", "phpdata", "isadmin"],
    mounted() {
      console.log("hello search")
    },
  computed: {
        input () {
            return this.$root.$data.searchinput.toLowerCase().trim()
        },
        filteredApps () {
            return this.phpdata.filter(o => {
                var name = o.name || ""
                var short = o.short || ""
                var tags = o.tags || ""
                return (name.toLowerCase().includes(this.input)
                       ||
                       tags.toLowerCase().includes(this.input)
                       ||
                       short.toLowerCase().includes(this.input))
            }).slice(0, 10)
        }
    }, 
    methods: {
        highlight(item) {
            if (item) {
                var exp = new RegExp(this.input, 'gi');
                return item.replace(exp, '<span class="font-bold bg-yellow-500 text-black dark:text-white">' +  this.input + '</span>')
            }
        },
        t(classname) {
            return classname + '-' + this.theme
        }
    }
}
</script>

<style>

</style>