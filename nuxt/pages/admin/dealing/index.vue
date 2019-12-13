<template>
  <v-layout>
    <v-flex wrap>
      <MyProfile
        :name="user.name"
        :icon="null"
        :city="user.city"
        :address="user.address"
      />
      <template v-if="getStateDealing">
        <ConfirmPanel v-if="getStateDealing.status === 0">
          <p slot="mainText">取引申込みされました</p>
          <v-btn slot="refusal" x-small>拒否</v-btn>
          <v-btn
            slot="permission"
            @click="onFlgUpdate"
            color="deep-purple accent-4"
            x-small
            class="white--text"
            >合意
          </v-btn>
        </ConfirmPanel>
        <ConfirmPanel v-if="getStateDealing.status === 1">
          <p slot="mainText">商品受け取り待ち</p>
        </ConfirmPanel>
        <ConfirmPanel v-if="getStateDealing.status === 2">
          <p slot="mainText">入金待ち</p>
          <v-btn slot="refusal" x-small>キャンセル</v-btn>
          <v-btn
            slot="permission"
            @click="onFlgUpdate"
            color="deep-purple accent-4"
            x-small
            class="white--text"
            >入金確認
          </v-btn>
        </ConfirmPanel>
        <ConfirmPanel v-if="getStateDealing.status === 3">
          <p slot="mainText">商品貸出中</p>
          <v-btn
            slot="permission"
            @click="onFlgUpdate"
            color="deep-purple accent-4"
            x-small
            class="white--text"
            >取引完了
          </v-btn>
        </ConfirmPanel>
        <ConfirmPanel
          v-if="
            (getStateDealing.status === 4 || getStateDealing.status === 5) &&
              !getStateDealing.rating_admin
          "
        >
          <v-btn
            slot="mainText"
            @click="onSetUserStar"
            x-small
            color="deep-purple accent-4"
            class="white--text"
            >評価する</v-btn
          >
          <v-rating
            slot="permission"
            @click="onFlgUpdate"
            v-model="star"
            color="#000000"
            background-color="#000000"
          />
        </ConfirmPanel>
        <ConfirmPanel
          v-if="
            (getStateDealing.status === 4 || getStateDealing.status === 5) &&
              getStateDealing.rating_admin
          "
        >
          <p slot="mainText">取引完了しました</p>
        </ConfirmPanel>
        <ConfirmPanel v-if="getStateDealing.status === 6">
          <p slot="mainText">取引はキャンセルされました</p>
        </ConfirmPanel>
      </template>
      <ChatPanel :dealing-id="dealingId" :user-id="user.id" />
    </v-flex>
  </v-layout>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

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
    ...mapGetters('auth', ['getUser']),
    ...mapGetters('dealing', ['getStateDealing'])
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
    this.getDealingStatus(this.dealingId)
  },
  methods: {
    ...mapActions('dealing', {
      getDealingStatus: 'getDealing',
      updateDealingFlg: 'updateDealingFlg'
    }),
    ...mapActions('evaluation', { setUserStar: 'setUserStar' }),
    async onFlgUpdate() {
      console.log('onClick')
      await this.updateDealingFlg(this.dealingId)
    },
    async onSetUserStar() {
      const params = {
        user_id: this.getStateDealing.user_id,
        star: this.star,
        dealing_id: this.dealingId,
        is_admin: true
      }
      await this.setUserStar(params)
    }
  }
}
</script>

<style scoped></style>
