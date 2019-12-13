<template>
  <v-container class="page-main">
    <v-form class="form-layout">
      <div class="form-text-field">
        <v-text-field
          v-model="user.email"
          label="e-mail"
          hint="input login e-mail address"
        />
        <v-text-field
          v-model="user.password"
          :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append="showPassword = !showPassword"
          :type="showPassword ? 'text' : 'password'"
          label="password"
        />
      </div>
      <div class="form-button">
        <v-btn
          @click="pushLogin"
          color="#6200EE"
          type="button"
          class="white--text login-button"
          hint="Assistive text"
          >Login</v-btn
        >
        <v-btn @click="pushRegister" color="#6200EE" type="button" outlined
          >新規登録</v-btn
        >
      </div>
    </v-form>
  </v-container>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  layout: 'logout',
  components: {},
  data() {
    return {
      user: {
        email: null,
        password: null
      },
      showPassword: false
    }
  },
  computed: {
    ...mapGetters('auth', ['getLoginState'])
  },
  watch: {
    getLoginState(val, oldVal) {
      if (val) {
        console.log('val', val)
        this.$router.push({ path: `/` })
      }
    }
  },
  created() {
    if (this.getLoginState) {
      this.$router.push({ path: `/mypage` })
    }
  },
  methods: {
    ...mapActions('auth', { goLogin: 'login' }),
    async pushLogin() {
      await this.goLogin(this.user)
      location.reload()
      console.log('push login')
    },
    pushRegister() {
      this.$router.push({ path: `/register` })
    }
  }
}
</script>

<style scoped lang="scss">
.page-main {
  height: calc(100vh - 92px);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.form-layout {
  width: 75%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.form-text-field {
  margin-bottom: 56px;
  width: 100%;
  display: flex;
  flex-direction: column;
}
.form-button {
  width: 35%;
  display: flex;
  flex-direction: column;
}
.login-button {
  margin-bottom: 37px;
}
</style>
