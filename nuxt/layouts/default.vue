<template>
  <v-app>
    <v-navigation-drawer v-model="drawer" temporary fixed>
      <template>
        <v-list>
          <v-list-item>
            <v-list-item-avatar>
              <v-img
                src="https://randomuser.me/api/portraits/women/85.jpg"
              ></v-img>
            </v-list-item-avatar>
          </v-list-item>

          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="title">
                {{ user.name }}
              </v-list-item-title>
              <v-list-item-subtitle>
                {{ user.city }}{{ user.address }}
              </v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </template>

      <v-divider></v-divider>

      <v-list nav dense>
        <v-list-item to="mypage">
          <v-list-item-icon>
            <v-icon>mdi-home</v-icon>
          </v-list-item-icon>
          <v-list-item-title>マイページ</v-list-item-title>
        </v-list-item>
        <v-list-item to="test">
          <v-list-item-icon>
            <v-icon>mdi-magnify</v-icon>
          </v-list-item-icon>
          <v-list-item-title>商品検索</v-list-item-title>
        </v-list-item>
        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-format-list-bulleted</v-icon>
          </v-list-item-icon>
          <v-list-item-title>登録商品一覧</v-list-item-title>
        </v-list-item>
        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-package-variant-closed</v-icon>
          </v-list-item-icon>
          <v-list-item-title>貸出商品登録</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar :clipped-left="clipped" fixed app class="header-colour">
      <v-btn @click.stop="drawer = !drawer" icon>
        <v-icon>mdi-menu</v-icon>
      </v-btn>
      <v-toolbar-title>
        <v-btn text to="/">
          Cloud Kitchen
        </v-btn>
      </v-toolbar-title>
      <v-spacer />
    </v-app-bar>
    <v-content>
      <v-container>
        <nuxt />
      </v-container>
    </v-content>
    <v-footer :fixed="fixed" app>
      <span>&copy; 2019</span>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  data: () => ({
    clipped: false,
    drawer: null,
    fixed: false,
    login: false,
    user: {
      name: 'user name',
      city: '福岡県福岡市',
      address: '博多区美野島'
    }
  }),
  computed: {},
  watch: {},
  async created() {},
  methods: {}
}
</script>

<style scoped>
.drawer-title {
  margin: 15px 15px 15px 15px;
}
.item-style {
  margin-top: 10px;
  margin-bottom: 10px;
}
.header-colour {
  background-color: #a8fffb;
}
</style>
