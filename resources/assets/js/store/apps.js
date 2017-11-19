export const state = () => ({
  apps: [],
  current: {},
  newest: {}
})

export const getters = {
  'app:get': state => {
    return state.apps
  },
  'app:newest': state => {
    return state.newest
  }
}

export const mutations = {
  'app:set' (state, val) {
    state.apps = val
  },
  'app:add' (state, val) {
    state.apps.push(val)
    state.newest = val
  },
  'app:uid' (state, val) {
    state.current.uid = val
  },
  'app:update' (state, val) {
    let i
    if (state.current.uid) {
      state.apps = Object.assign({}, val)
    } else {
      i = state.apps.findIndex(app => {
        return app.uid === state.current.uid
      })
      Object.keys(val).forEach(key => {
        state.apps[i][key] = val[key]
      })
    }

  },

  // remove (state, val) {
  //   let i = state.apps.findIndex(app => {
  //     return app.uid === val.uid
  //   })
  //   state.apps.splice(i, 1)
  //   this.$axios.post('/apps/remove', {_id: val._id})
  // },

  'app:save' (state) {
    let i
    if (state.current.uid) {
      i = state.apps
    } else {
      i = state.apps.find(app => {
        return app.uid === state.current.uid
      })
    }
    console.log(i)
    axios.post('/app/update', i)
    .then(doc => {
      console.log(i, doc)
    })
  }
}

export const actions = {
  'app:create' ({commit, rootGetters}) {
    return new Promise((resolve, reject) => {
      axios.post('/app/create')
      .then(({data}) => {
        commit('app:add', data)
        resolve(data)
      })
    });
    // const doc = await this.$axios.$post('/apps/modify')
  }
}
