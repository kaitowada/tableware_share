export const state = () => ({
  user: {},
  apiToken: null,
  loginState: false
})
export const mutations = {
  setUser(state, user) {
    state.user = user
    localStorage.setItem('user', JSON.stringify(user))
  },

  setAccessToken(state, apiToken) {
    state.apiToken = apiToken
    localStorage.setItem('accessToken', apiToken)
    this.$axios.setToken(localStorage.getItem('accessToken'), 'Bearer')
    console.log('setAccessToken', localStorage.accessToken)
  },
  setLoginState(state, loginStatus) {
    console.log('setState')
    localStorage.setItem('loginState', loginStatus)
    state.loginState = loginStatus
  },
  unsetAuthInfo(state) {
    state.user = null
    state.accessToken = null
    state.loginState = false
    localStorage.removeItem('accessToken')
    localStorage.removeItem('user')
    localStorage.removeItem('loginState')
    localStorage.clear()
  }
}

export const actions = {
  async register({ dispatch, commit }, data) {
    const url = 'register/new_user'
    await this.$axios.$post(url, data)
  },

  async login({ dispatch, commit }, data) {
    const url = 'login'
    const response = await this.$axios.$post(url, data)
    const user = {
      id: response.id,
      name: response.name,
      email: response.email,
      city: response.city,
      address: response.address,
      birthday: response.birthday,
      image_path: response.image_path
    }
    console.log('response', response)
    commit('setAccessToken', response.api_token)
    commit('setUser', user)
    commit('setLoginState', true)
  }
}

export const getters = {
  getLoginState(state) {
    return localStorage.getItem('loginState')
  },

  getUser(state) {
    console.log('user', localStorage.getItem('user'))
    return JSON.parse(localStorage.getItem('user'))
  }
}
