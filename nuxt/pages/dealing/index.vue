<template>
  <v-layout>
    <v-flex xs12 wrap>
      <MyProfile />
    </v-flex>
  </v-layout>
</template>

<script>
import MyProfile from '../../components/parts/cards/MyProfile'
export default {
  components: {
    MyProfile
  },
  data() {
    return {
      user: {
        name: 'my name',
        icon: 'https://randomuser.me/api/portraits/women/85.jpg',
        city: '福岡県福岡市',
        address: '博多区美野島'
      }
    }
  },
  computed: {},
  watch: {},
  async created() {},
  methods: {}
}
</script>

<style scoped></style>
