export const state = () => ({
  dealingsSituation: null,
  alert: false
})

export const mutations = {
  setDealingsSituation(state, situation) {
    state.dealingsSituation = situation
    if (situation.length) {
      state.alert = true
    } else {
      state.alert = false
    }
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
  }
}

export const getters = {
  getAlert(state) {
    return state.alert
  },
  getSituation(state) {
    return state.dealingsSituation
  }
}
