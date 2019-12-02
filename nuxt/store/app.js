export const state = () => ({
  isAlertDisplay: false
})
export const mutations = {
  toggleAlertDisplay(state) {
    state.isAlertDisplay = !state.isAlertDisplay
  }
}
export const actions = {
  changeAlertDisplay({ dispatch, commit }) {
    commit('toggleAlertDisplay')
  }
}
export const getters = {
  alertDisplayFlg(state) {
    return state.isAlertDisplay
  }
}
