<template>
  <v-app>
    <v-app-bar :clipped-left="false" fixed app class="header-colour">
      <v-toolbar-title @click="goLogin">
        Cloud Kitchen
      </v-toolbar-title>
      <v-spacer />
    </v-app-bar>
    <v-content>
      <nuxt />
    </v-content>
    <v-footer :fixed="false" app>
      <span>&copy; 2019</span>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  methods: {
    goLogin() {
      this.$router.push({ path: `/login` })
    }
  }
}
</script>

<style scoped>
.header-colour {
  background-color: #a8fffb;
}
</style>
