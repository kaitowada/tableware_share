<template>
  <v-card :flat="true">
    <v-container v-if="getCommodity">
      <v-layout :justify-center="true" row wrap>
        <v-flex xs11>
          <template v-if="getCommodity.image_path">
            <v-img :src="getCommodity.image_path" class="image-style" />
          </template>
          <template v-else>
            <v-icon size="325" class="image-style">
              mdi-alert-box-outline
            </v-icon>
          </template>
        </v-flex>
        <v-flex xs12>
          <v-card-title class="headline font-weight-bold">
            {{ getCommodity.name }}
          </v-card-title>
        </v-flex>
        <v-flex>
          <v-card>
            <v-subheader class="font-weight-bold">
              取引場所 :{{ getCommodity.user.city + getCommodity.user.address }}
            </v-subheader>
            <v-subheader class="font-weight-bold">
              金額 : {{ getCommodity.price }}円
            </v-subheader>
            <v-card-text class="body-1">
              {{ getCommodity.description }}
            </v-card-text>
            <v-btn @click="goDealing">
              取引を開始する
            </v-btn>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </v-card>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  data() {
    return {
      commodityId: '',
      commodity: null
    }
  },
  computed: {
    ...mapGetters('auth', ['getUser']),
    ...mapGetters('commodity', ['getCommodity'])
  },
  watch: {},
  async created() {
    this.commodityId = this.$route.params.commodityId
    await this.getCommodityDetail(this.commodityId)
  },
  methods: {
    ...mapActions('commodity', { getCommodityDetail: 'getCommodityDetail' }),
    ...mapActions('dealing', { dealingStart: 'dealingStart' }),
    async goDealing() {
      console.log('取引開始ボタン')
      const params = {
        user_id: this.getUser.id,
        commodity_id: this.commodityId,
        status: 0
      }
      const response = await this.dealingStart(params)
      this.$router.push({
        path: `/dealing`,
        query: { dealing_id: response.id }
      })
    }
  }
}
</script>

<style lang="scss" scoped>
.image-style {
  display: inline-block;
  width: 350px;
  height: 350px;
}
</style>
