export const state = () => ({
  // admin: {}
})

export const getters = {
  // get: (state, getters, parent) => {
  //   const res = {
  //     isAdmin: parent.auth.isAdmin,
  //     editing: parent.auth.editing
  //   }
  //   return res
  // }
}


export const actions = {
  'auth:edit' ({commit}) {
    axios.post('/auth/toggleEditing')
    .then(({data}) => {
      commit('auth:set', data)
    })
  }
}
