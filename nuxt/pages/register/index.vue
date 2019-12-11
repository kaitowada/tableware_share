<template>
  <v-container class="page-main">
    <v-form class="form-layout">
      <h1 class="title-font">新規 ユーザ登録</h1>
      <div class="form-text-field">
        <v-text-field
          v-model="user.email"
          label="e-mail"
          hint="ログインに使用するe-mailアドレス"
        />
        <v-text-field
          v-model="user.password"
          label="password"
          hint="ログインに使用するパスワード"
        />
        <v-row>
          <v-col cols="12" lg="6">
            <v-menu
              v-model="menu1"
              :close-on-content-click="false"
              max-width="290"
            >
              <template v-slot:activator="{ on }">
                <v-text-field
                  :value="computedDateFormattedMomentjs"
                  v-on="on"
                  @click:clear="date = null"
                  clearable
                  label="誕生日"
                  readonly
                />
              </template>
              <v-date-picker
                v-model="date"
                @change="menu1 = false"
                color="#6200EE"
              />
            </v-menu>
          </v-col>
        </v-row>
        <v-text-field
          v-model="user.city"
          label="address 1"
          hint="e.g. 福岡県福
          岡市"
        />
        <v-text-field
          v-model="user.address"
          label="address 2"
          hint="e.g. 福岡県福岡市"
        />
      </div>
      <div class="form-button">
        <v-btn @click="pushCansel" color="#6200EE" type="button" outlined
          >キャンセル</v-btn
        >
        <v-btn
          @click="pushRegister"
          color="#6200EE"
          type="button"
          class="white--text login-button"
          hint="Assistive text"
          >登録</v-btn
        >
      </div>
    </v-form>
  </v-container>
</template>

<script>
import moment from 'moment'
import { mapActions } from 'vuex'
export default {
  layout: 'logout',
  components: {},
  data() {
    return {
      user: {
        email: null,
        password: null,
        city: '',
        address: ''
      },
      date: '',
      menu1: false,
      menu2: false
    }
  },
  computed: {
    computedDateFormattedMomentjs() {
      return this.date ? moment(this.date).format('YYYY-MM-DD') : ''
    }
  },
  watch: {},
  methods: {
    ...mapActions('auth', { registerUser: 'register' }),
    pushCansel() {
      this.$router.push('/login')
    },
    pushRegister() {
      const params = {
        email: this.user.email,
        password: this.user.password,
        city: this.user.city,
        address: this.user.address,
        birthday: this.date
      }
      this.registerUser(params)
      this.$router.push('/login')
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
.title-font {
  margin-top: 50px;
  font-size: 23px;
  font-weight: normal;
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
  width: 100%;
  display: flex;
  justify-content: space-around;
  > button {
    width: 93px;
  }
}
.login-button {
  margin-bottom: 37px;
}
</style>
