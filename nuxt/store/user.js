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
    await this.$axios.$put('/user/1', data.postData)
    commit('setUser')
  },
  async updateUserImage({ commit }, data) {
    await this.$axios.$post('/user/update_image/' + data.userId, data.image, {
      headers: { 'content-type': 'multipart/form-data' }
    })
  }
}
export const getters = {
  alertDisplayFlg(state) {
    return state.isAlertDisplay
  }
}
