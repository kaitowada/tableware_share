export const state = () => ({
  user: []
})
export const mutations = {
  setUser(state, user) {
    state.user = user
    localStorage.setItem('user', JSON.stringify(user))
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
    const url = '/user/' + data.userId
    const response = await this.$axios.$put(url, data.postData)
    commit('setUser', response)
  },
  async updateUserImage({ commit }, data) {
    const url = '/user/update_image/' + data.userId
    await this.$axios.$post(url, data.image, {
      headers: { 'content-type': 'multipart/form-data' }
    })
  }
}
export const getters = {
  alertDisplayFlg(state) {
    return state.isAlertDisplay
  }
}
