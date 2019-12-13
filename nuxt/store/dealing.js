export const state = () => ({
  dealing: null,
  dealingsSituation: null,
  alert: false
})

export const mutations = {
  setDealingsSituation(state, situation) {
    state.dealingsSituation = situation
    state.alert = !!situation.length
  },
  setDealing(state, dealing) {
    state.dealing = dealing.data
  }
}

export const actions = {
  async getDealingsSituation({ dispatch, commit }, data) {
    const response = await this.$axios.$get('/dealing/get_status_trading', {
      params: {
        user_id: data
      }
    })
    commit('setDealingsSituation', response)
  },
  async dealingStart({ dispatch, commit }, data) {
    const url = '/dealing'
    const response = await this.$axios.$post(url, data)
    dispatch('getDealingsSituation', data.user_id)
    return response
  },

  async getDealing({ dispatch, commit }, data) {
    const url = '/dealing/' + data
    const response = await this.$axios.get(url)
    commit('setDealing', response)
  },

  async updateDealingFlg({ dispatch, commit }, data) {
    const url = '/dealing/' + data
    await this.$axios.$put(url)
  }
}

export const getters = {
  getAlert(state) {
    return state.alert
  },
  getSituation(state) {
    return state.dealingsSituation
  },
  getStateDealing(state) {
    return state.dealing
  }
}
