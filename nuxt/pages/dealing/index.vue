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
      <ChatPanel :dealing-id="dealingId" :user-id="user.id" />
    </v-flex>
  </v-layout>
</template>

<script>
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
      user: {
        id: 1,
        name: 'my name',
        icon: 'https://randomuser.me/api/portraits/women/85.jpg',
        city: '福岡県福岡市',
        address: '博多区美野島'
      },
      star: 0,
      dealingId: 2,
      postMessage: '',
      intervalId: null
    }
  },
  computed: {},
  watch: {},
  async created() {},
  methods: {}
}
</script>

<style scoped></style>
