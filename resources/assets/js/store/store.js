import Vue from 'vue';
import Vuex from 'vuex';
import { getField, updateField } from 'vuex-map-fields';

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        route: '/'
    },
    getters: {
        getField
    },
    mutations: {
        updateField
    }
})