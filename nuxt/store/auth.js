export const actions = {
  // メールアドレスログイン
  async login({ dispatch, commit }, { data }) {
    console.log('start')
    const response = await this.$axios.$post(
      'http://localhost:4000/api/login',
      // 'http://0.0.0.0:5600/api/login',
      data
    )
    console.log(response)
    return Promise.resolve(response)
  }
}
