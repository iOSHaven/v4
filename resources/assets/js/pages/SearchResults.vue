<template>
  <ul class="mt-3" v-if="input">
        <!-- Search result -->
        <h1>Search results</h1>
        <li :key="app.uid" v-for="app in filteredApps" :class="['flex', 'items-center', 'justify-between', t('border-gray-200'), 'border-b', 'no-border-on-last']">
            <a :href="`/app/${app.uid}`" class="flex items-center justify-start overflow-hidden py-3">
                <img class="rounded-lg mr-3" :src="app.icon" alt="" height="25" width="25">
                <span class="truncate">{{ app.name }}</span>
            </a>
            <div class="flex flex-grow items-center justify-end">
                <a v-if="app.unsigned" :href="`/download/${app.uid}`" :class="['font-bold', 'rounded-full', 'text-xs', 'px-3', 'py-1', t('bg-blue'), t('text-white'), 'mr-1']">IPA</a>
                <a v-if="app.signed" :href="`/install/${app.uid}`" :class="['font-bold', 'rounded-full', 'text-xs', 'px-3', 'py-1', t('bg-gray-100'), t('text-blue'), 'mr-1']">GET</a>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    props: ["theme", "phpdata"],
    computed: {
        input () {
            return this.$root.$data.searchinput.toLowerCase().trim()
        },
        filteredApps () {
            return this.phpdata.filter(o => {
                var tags = o.tags || ""
                return (o.name.toLowerCase().includes(this.input)
                       ||
                       tags.toLowerCase().includes(this.input)
                       ||
                       o.short.toLowerCase().includes(this.input))
                       && !(o.signed == null && o.unsigned == null)
            }).slice(0, 10)
        }
    }, 
    methods: {
        t(classname) {
            return classname + '-' + this.theme
        }
    }
}
</script>

<style>

</style>