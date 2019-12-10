<template>
  <v-app>
    <v-navigation-drawer v-model="drawer" temporary fixed>
      <template>
        <v-list>
          <v-list-item>
            <v-list-item-avatar size="55">
              <v-img :src="user.icon" />
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

      <v-divider />

      <v-list nav dense>
        <v-list-item to="/mypage">
          <v-list-item-icon>
            <v-icon>mdi-home</v-icon>
          </v-list-item-icon>
          <v-list-item-title>マイページ</v-list-item-title>
        </v-list-item>
        <v-list-item link>
          <v-list-item-icon>
            <v-icon>mdi-magnify</v-icon>
          </v-list-item-icon>
          <v-list-item-title>商品検索</v-list-item-title>
        </v-list-item>
        <v-list-item to="/my-commodities">
          <v-list-item-icon>
            <v-icon>mdi-format-list-bulleted</v-icon>
          </v-list-item-icon>
          <v-list-item-title>登録商品一覧</v-list-item-title>
        </v-list-item>
        <v-list-item to="/commodities/new">
          <v-list-item-icon>
            <v-icon>mdi-package-variant-closed</v-icon>
          </v-list-item-icon>
          <v-list-item-title>貸出商品登録</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-card>
      <v-navigation-drawer
        v-model="alertFlg"
        :right="true"
        :hide-overlay="true"
        temporary
        fixed
      >
        <v-list :two-line="true" :nav="true" :flat="true">
          <v-subheader>
            お知らせ
          </v-subheader>
          <v-list-item-group>
            <v-list-item
              v-for="situation in getSituation"
              @click="getLink(situation)"
            >
              <v-list-item-content>
                <v-list-item-title>
                  {{ situation.name }}の品で取引をしています
                </v-list-item-title>
                <v-list-item-subtitle>
                  取引を進めてください。
                </v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group>
        </v-list>
      </v-navigation-drawer>
    </v-card>

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
      <template v-if="getAlert">
        <v-btn @click="changeAlertFlg" icon>
          <v-icon>mdi-bell-alert</v-icon>
        </v-btn>
      </template>
      <template v-else>
        <v-btn @click="changeAlertFlg" icon>
          <v-icon>mdi-bell</v-icon>
        </v-btn>
      </template>
    </v-app-bar>
    <v-content>
      <nuxt />
    </v-content>
    <v-footer :fixed="fixed" app>
      <span>&copy; 2019</span>
    </v-footer>
  </v-app>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  data: () => ({
    clipped: false,
    drawer: null,
    fixed: false,
    login: false,
    alertFlg: false,
    user: {
      id: 1,
      name: 'user name',
      city: '福岡県福岡市',
      address: '博多区美野島',
      icon: 'https://randomuser.me/api/portraits/women/85.jpg'
    }
  }),
  computed: {
    ...mapGetters('dealing', ['getAlert', 'getSituation'])
  },
  watch: {},
  async created() {
    await this.getDealingsSituation(this.user.id)
  },
  methods: {
    ...mapActions('dealing', { getDealingsSituation: 'getDealingsSituation' }),
    changeAlertFlg() {
      this.alertFlg = !this.alertFlg
    },
    getLink(situation) {
      if (situation.id === this.user.id) {
        console.log('getLink')
      }
    }
  }
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
