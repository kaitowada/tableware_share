export const state = () => ({
  star: 0
})
export const mutations = {
  setStar(state, star) {
    state.star = star
  }
}
export const actions = {
  async getUserStar({ dispatch, commit }, data) {
    const response = await this.$axios.$get(
      'http://localhost:4000/api/evaluation/' + data
    )
    commit('setStar', response)
  }
}
export const getters = {
  getUserStar(state) {
    return state.star
  }
}
