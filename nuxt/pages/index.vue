<template>
  <div>
    <div class="a">
      <p><font size="5">ログイン</font></p>
    </div>
    <div>
      <v-card class="mx-auto" max-width="300" outlined>
        <v-list-item three-line>
          <v-form>
            <v-row>
              <div class="c">
                <v-text-field
                  v-model="email"
                  :rules="emailRules"
                  label="email"
                  required
                ></v-text-field>
              </div>
              <div class="d">
                <v-container fluid>
                  <v-text-field
                    :append-icon="show3 ? 'mdi-eye' : 'mdi-eye-off'"
                    :rules="[rules.required, rules.min]"
                    :type="show3 ? 'text' : 'password'"
                    v-model="password"
                    name="input-10-2"
                    label="パスワード"
                    hint="8文字以上"
                    value=""
                    class="input-group--focused"
                    @click:append="show3 = !show3"
                  ></v-text-field>
                </v-container>
              </div>
            </v-row>
          </v-form>
        </v-list-item>
        <v-card-actions>
          <div class="b">
            <v-btn text>ログイン</v-btn>
            <v-btn text>会員登録</v-btn>
          </div>
        </v-card-actions>
      </v-card>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      show3: false,
      email: '',
      password: '',
      rules: {
        required: (value) => !!value || '８文字以上',
        min: (v) => v.length >= 8 || '８文字以上入力してください',
        emailMatch: () => '"The email and password you entered don\'t match"'
      }
    }
  }
}
</script>

<style scoped>
.a {
  margin-top: 5%;
  text-align: center;
}
.b {
  margin-top: 5%;
  margin-left: 20%;
  margin-bottom: 10%;
}
.c {
  margin-top: 10%;
  margin-left: 8.5%;
  flex-grow: 0.05;
  flex-wrap: wrap;
  width: 80%;
}
.d {
  flex-grow: 0.65;
  margin-left: 4.5%;
}
</style>
