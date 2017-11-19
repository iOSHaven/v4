import * as auth from './auth'
import * as apps from './apps'

export const state = () => ({
  counter: 0,
  auth: {}
})

export const mutations = {
  'auth:set' (state, obj) {
    state.auth = (typeof obj === 'string') ? JSON.parse(obj) : obj
  },
  // increment (state) {
  //   state.counter++
  // }
}

export const getters = {
  auth: state => {
    return state.auth
  }
}

export const modules = {
  admin: auth,
  apps: apps
}
