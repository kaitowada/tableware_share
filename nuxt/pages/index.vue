<template><div></div></template>

<script>
import { mapGetters } from 'vuex'
export default {
  layout: 'logout',
  computed: {
    ...mapGetters('auth', ['getLoginState'])
  },
  created() {
    console.log('getLoginState', this.getLoginState)
    if (this.getLoginState) {
      this.$router.push({ path: `/mypage` })
    } else {
      this.$router.push({ path: `/login` })
    }
  }
}
</script>

<style scoped></style>
