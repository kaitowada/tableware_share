<template>
  <v-app>
    <v-navigation-drawer v-model="drawer" temporary fixed>
      <template>
        <v-list>
          <template v-if="false">
            <v-list-item>
              <v-list-item-avatar size="55">
                <v-img :src="user.image_path" />
              </v-list-item-avatar>
            </v-list-item>
          </template>
          <template v-else>
            <v-list-item>
              <v-list-item-avatar size="55">
                <!--                <v-icon size="55">mdi-account-circle</v-icon>-->
                <v-img
                  src="https://pbs.twimg.com/profile_images/1077172356487905281/BB3FaAc9_400x400.jpg"
                />
              </v-list-item-avatar>
            </v-list-item>
          </template>

          <v-list-item>
            <v-list-item-content>
              <v-list-item-title v-if="user.name" class="title">
                {{ user.name }}
              </v-list-item-title>
              <v-list-item-title v-else class="title">
                NoName
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
        <v-list-item to="/search">
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
        <v-divider />
        <v-list-item @click="logoutUser">
          <v-list-item-icon>
            <v-icon>mdi-logout-variant</v-icon>
          </v-list-item-icon>
          <v-list-item-title>ログアウト</v-list-item-title>
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
            <template v-if="getSituation">
              <v-list-item
                v-for="situation in getSituation"
                :key="getSituation.id"
                @click="getLink(situation)"
              >
                <v-list-item-content>
                  <v-list-item-title>
                    {{ situation.commodity.name }}の品で取引をしています
                  </v-list-item-title>
                  <v-list-item-subtitle>
                    取引を進めてください。
                  </v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>
            </template>
            <template v-else>
              <v-list-item>
                <v-list-item-content>
                  <v-list-item-title>
                    現在取引はありません。
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </template>
          </v-list-item-group>
        </v-list>
      </v-navigation-drawer>
    </v-card>

    <v-app-bar :clipped-left="clipped" fixed app color="#a8fffb">
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
    dealingId: 2,
    user: {}
  }),
  computed: {
    ...mapGetters('dealing', ['getAlert', 'getSituation']),
    ...mapGetters('auth', ['getUser'])
  },
  watch: {},
  async created() {
    this.user = this.getUser
    await this.getDealingsSituation(this.getUser.id)
  },
  methods: {
    ...mapActions('dealing', { getDealingsSituation: 'getDealingsSituation' }),
    ...mapActions('auth', { logout: 'logout' }),
    changeAlertFlg() {
      this.alertFlg = !this.alertFlg
    },
    getLink(situation) {
      if (situation.commodity.id === this.user.id) {
        this.$router.push({
          path: `/admin/dealing`,
          query: { dealing_id: situation.id }
        })
      } else {
        this.$router.push({
          path: `/dealing`,
          query: { dealing_id: situation.id }
        })
      }
    },
    async logoutUser() {
      await this.logout()
      this.$router.push({ path: `/login` })
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
