<template>
  <v-layout>
    <v-flex wrap>
      <MyProfile
        :name="user.name"
        :icon="null"
        :city="user.city"
        :address="user.address"
      />
      <ConfirmPanel>
        <p slot="mainText">取引申込み</p>
        <v-btn slot="refusal" x-small>拒否</v-btn>
        <v-btn
          slot="permission"
          color="deep-purple accent-4"
          x-small
          class="white--text"
          >合意
        </v-btn>
      </ConfirmPanel>
      <ConfirmPanel>
        <p slot="mainText">商品受け取り待ち</p>
      </ConfirmPanel>
      <ConfirmPanel>
        <p slot="mainText">入金待ち</p>
        <v-btn slot="refusal" x-small>キャンセル</v-btn>
        <v-btn
          slot="permission"
          color="deep-purple accent-4"
          x-small
          class="white--text"
          >入金確認
        </v-btn>
      </ConfirmPanel>
      <ConfirmPanel>
        <p slot="mainText">商品貸出中</p>
        <v-btn
          slot="permission"
          color="deep-purple accent-4"
          x-small
          class="white--text"
          >取引完了
        </v-btn>
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
      <ChatPanel :dealing-id="dealingId" :user-id="user.id" />
    </v-flex>
  </v-layout>
</template>

<script>
import { mapGetters } from 'vuex'

import MyProfile from '../../../components/parts/cards/MyProfile'
import ChatPanel from '../../../components/parts/cards/ChatPanel'
import ConfirmPanel from '../../../components/parts/cards/ConfirmPanel'

export default {
  components: {
    MyProfile,
    ConfirmPanel,
    ChatPanel
  },
  data() {
    return {
      user: {},
      star: 0,
      dealingId: null,
      postMessage: '',
      intervalId: null
    }
  },
  computed: {
    ...mapGetters('auth', ['getUser'])
  },
  watch: {},
  watchQuery(newQuery, oldQuery) {
    console.log('newQuery', newQuery)
    this.dealingId = newQuery.dealing_id
  },
  created() {
    console.log('this.$route.dealingId', this.$route.dealingId)
    this.dealingId = Number(this.$route.query.dealing_id)
    this.user = this.getUser
  },
  methods: {}
}
</script>

<style scoped></style>
