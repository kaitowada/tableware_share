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
      <ChatPanel :dealing-id="dealingId" :user-id="user.id" />
    </v-flex>
  </v-layout>
</template>

<script>
import { mapGetters } from 'vuex'

import MyProfile from '../../components/parts/cards/MyProfile'
import ConfirmPanel from '../../components/parts/cards/ConfirmPanel'
import ChatPanel from '../../components/parts/cards/ChatPanel'
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
  watchQuery(newQuery, oldQuery) {
    console.log('newQuery', newQuery)
    this.dealingId = newQuery.dealing_id
  },
  computed: {
    ...mapGetters('auth', ['getUser'])
  },
  watch: {},
  created() {
    console.log('this.$route.dealingId', this.$route.query.dealing_id)
    this.dealingId = Number(this.$route.query.dealing_id)
    this.user = this.getUser
  },
  methods: {}
}
</script>

<style scoped></style>
