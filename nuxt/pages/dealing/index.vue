<template>
  <v-layout>
    <v-flex wrap>
      <MyProfile />
      <ConfirmPanel>
        <p slot="mainText">取引合意待ち</p>
      </ConfirmPanel>
      <ConfirmPanel>
        <p slot="mainText">商品受け取り待ち</p>
        <v-btn slot="refusal" x-small>キャンセル</v-btn>
        <v-btn
          slot="permission"
          color="deep-purple accent-4"
          x-small
          class="white--text"
        >
          受取済み
        </v-btn>
      </ConfirmPanel>
      <ConfirmPanel>
        <p slot="mainText">入金中</p>
      </ConfirmPanel>
      <ConfirmPanel>
        <p slot="mainText">商品借用中</p>
      </ConfirmPanel>
      <ConfirmPanel>
        <p slot="mainText">評価する</p>
        <v-rating
          slot="permission"
          v-model="star"
          half-increments
          color="#000000"
          background-color="#000000"
        />
      </ConfirmPanel>
      <v-card>
        <v-container :fluid="true">
          <div v-for="chat in getChats">
            <template v-if="user.id === chat.user_id">
              <v-layout :justify-start="true" class="text-margin">
                <v-flex xs5>
                  <v-card>
                    <v-card-text>
                      {{ chat.text }}
                    </v-card-text>
                  </v-card>
                </v-flex>
              </v-layout>
            </template>
            <template v-else>
              <v-layout :justify-end="true">
                <v-flex xs5>
                  <v-card>
                    <v-card-text>
                      {{ chat.text }}
                    </v-card-text>
                  </v-card>
                </v-flex>
              </v-layout>
            </template>
          </div>
        </v-container>
      </v-card>
      <v-layout row>
        <v-flex xs9>
          <v-text-field single-line solo />
        </v-flex>
        <v-flex>
          <v-btn @click="chatPost" large>
            送信
          </v-btn>
        </v-flex>
      </v-layout>
    </v-flex>
  </v-layout>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

import MyProfile from '../../components/parts/cards/MyProfile'
import ConfirmPanel from '../../components/parts/cards/ConfirmPanel'
export default {
  components: {
    MyProfile,
    ConfirmPanel
  },
  data() {
    return {
      user: {
        id: 1,
        name: 'my name',
        icon: 'https://randomuser.me/api/portraits/women/85.jpg',
        city: '福岡県福岡市',
        address: '博多区美野島'
      },
      star: 0,
      dealingId: 2,
      userId: 2
    }
  },
  computed: {
    ...mapGetters('chat', ['getChats'])
  },
  watch: {},
  async created() {
    await this.getDealingChat(this.dealingId)
  },
  methods: {
    ...mapActions('chat', { getDealingChat: 'getTransactionChat' }),
    chatPost() {
      console.log('onClick 送信')
    }
  }
}
</script>

<style scoped>
.text-margin {
  margin: 10px;
}
</style>
