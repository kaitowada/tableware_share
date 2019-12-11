export const state = () => ({
  commodities: null,
  commodityDetail: null
})
export const mutations = {
  setCommodities(state, params) {
    state.commodities = params
  },
  setCommodityDetail(state, params) {
    state.commodityDetail = params
  }
}
export const actions = {
  async commodityRegister({ dispatch, commit }, data) {
    const url = '/commodity'
    await this.$axios.$post(url, data)
  },
  async getCommoditiesList({ dispatch, commit }, data) {
    const url = '/commodity/search/' + data
    const response = await this.$axios.$get(url)
    commit('setCommodities', response)
  },
  async getCommodityDetail({ dispatch, commit }, data) {
    const url = '/commodity/' + data
    const response = await this.$axios.$get(url)
    commit('setCommodityDetail', response)
  }
}
export const getters = {
  getCommodities(state) {
    return state.commodities
  },
  getCommodity(state) {
    return state.commodityDetail
  }
}
