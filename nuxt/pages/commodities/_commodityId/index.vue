<template>
  <v-card :flat="true">
    <v-container>
      <v-layout :justify-center="true" row wrap>
        <v-flex xs11>
          <v-img :src="commodity.icon" class="image-style" />
        </v-flex>
        <v-flex xs12>
          <v-card-title class="headline font-weight-bold">
            {{ commodity.name }}
          </v-card-title>
        </v-flex>
        <v-flex>
          <v-card>
            <v-subheader class="font-weight-bold">
              取引場所 :{{ user.city + user.address }}
            </v-subheader>
            <v-subheader class="font-weight-bold">
              金額 : {{ commodity.price }}円
            </v-subheader>
            <v-card-text class="body-1">
              {{ commodity.description }}
            </v-card-text>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      commodity: {
        name: 'shankou',
        price: 10000000,
        icon: 'https://randomuser.me/api/portraits/women/85.jpg',
        description:
          'Nulla totam consequuntur et sunt magnam. Inventore aut dolores modi accusamus molestiae id. Impedit in vero alias ut eum a velit. Voluptas molestias magni voluptate quos illum beatae.'
      },
      user: {
        name: '加藤恵',
        city: '福岡県福岡市',
        address: '東区和白丘'
      }
    }
  },
  computed: {},
  watch: {},
  async created() {},
  methods: {}
}
</script>

<style lang="scss" scoped>
.image-style {
  display: inline-block;
  width: 350px;
  height: 350px;
}
</style>
