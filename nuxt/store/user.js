export const state = () => ({
  user: {}
})
export const mutations = {
  setUser(state, user) {
    state.user = user
    localStorage.setItem('user', JSON.stringify(user))
  }
}
export const actions = {}
export const getters = {
  alertDisplayFlg(state) {
    return state.isAlertDisplay
  }
}
