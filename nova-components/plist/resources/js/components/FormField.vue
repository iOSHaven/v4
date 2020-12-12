<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <input
                :id="field.name"
                type="text"
                class="w-full form-control form-input form-input-bordered"
                :class="errorClasses"
                :placeholder="field.name"
                v-model="value"
                @change="handleChange"
            />
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    mounted () {
        
        this.urlComponent = this.$parent.$children.find(x => x.$props.field.attribute == "url")
        // console.log('plist mounted', this, urlComponent, urlComponent.$data.value)
        
    },

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            // this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            // formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(e) {
            // this.value = value
            console.log(this.value)
            // this.urlComponent.$data.value = "injected"
            var uricomponent = new URLSearchParams(this.value)
            var url = uricomponent.get('url')
            console.log(url)

            var _axios = axios.create()
            Object.keys(_axios.defaults.headers.common).forEach(key => {
                delete _axios.defaults.headers.common[key]
            })
            console.log(_axios.defaults.headers.common)
            _axios.get(url).then(res => {
                var plist = res.data
                if (plist.startsWith("<?xml")) {
                    axios.post('/add/iosgods/plist', {plist}).then(res2 => {
                        this.urlComponent.$data.value = res2.data
                    })
                }
            })
        },
    },
}
</script>
