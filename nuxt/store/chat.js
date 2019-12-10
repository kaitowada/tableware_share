export const state = () => ({
  chat: []
})
export const mutations = {
  setChat(state, chatData) {
    state.chat = chatData
  }
}
export const actions = {
  async getTransactionChat({ dispatch, commit }, dealingId) {
    const response = await this.$axios.$get('/chat_log/' + dealingId)
    commit('setChat', response)
  },
  async saveMessageLog({ dispatch, commit }, data) {
    console.log('saveMessageLog')
    await this.$axios.$post('/chat_log', data)
  }
}
export const getters = {
  getChats(state) {
    return state.chat
  }
}
