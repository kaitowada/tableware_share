export const state = () => ({
  user: []
})
export const mutations = {
  setUser(state, user) {
    state.user = user
  }
}
export const actions = {
  async login({ dispatch, commit }, { data }) {
    try {
      const response = await this.$axios.$post(
        'http://localhost:4000/api/login',
        data
      )
      const user = {
        id: response.id,
        email: response.email
      }
      console.log('response', response)
      dispatch('setUser', user)
      dispatch('setAccessToken', response.api_token)
      dispatch('setLoginState', true)
      return Promise.resolve(response)
    } catch (error) {
      return Promise.reject(error)
    }
  },

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
