export const state = () => ({
  user: []
})
export const mutations = {
  setUser(state, user) {
    state.user = user
  }
}
export const actions = {
  async updateUserAddress({ dispatch, commit }, data) {
    console.log('data', data.postData)
    console.log('userId', data.userId)
    await this.$axios.$put('http://localhost:4000/api/user/1', data.postData)
    commit('setUser')
  }
}
export const getters = {
  alertDisplayFlg(state) {
    return state.isAlertDisplay
  }
}
