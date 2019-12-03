<template>
  <div>
    <a> {{ test_email }} </a>
    <a> {{ test_pass }} </a>
    <a> {{ test_ans }} </a>
    <v-btn type="button" @click="login">ログイン</v-btn>
  </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
  data() {
    return {
      test_email: 'mai',
      test_pass: 'maimai',
      test_ans: ''
    }
  },
  created() {
    console.log(this.loginState)
  },
  methods: {
    ...mapActions('auth', { authLogin: 'login' }),
    async login() {
      const data = {
        mai: this.test_email,
        pas: this.test_pass
      }
      this.test_ans = await this.authLogin({
        data,
        SaveLoginState: this.saveLoginState
      })
      console.log('A')
    }
  }
}
</script>
