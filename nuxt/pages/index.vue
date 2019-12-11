<template><div></div></template>

<script>
import { mapGetters } from 'vuex'
export default {
  computed: {
    ...mapGetters('auth', ['getLoginState'])
  },
  created() {
    if (this.getLoginState) {
      this.$router.push({ path: `/mypage` })
    } else {
      this.$router.push({ path: `/login` })
    }
  }
}
</script>

<style scoped></style>
