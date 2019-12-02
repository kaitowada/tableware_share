<template>
  <v-card :tile="true" class="card-layout">
    <v-list>
      <v-layout wrap>
        <v-flex>
          <v-list-item>
            <v-list-item-avatar size="60">
              <v-img :src="user.icon" />
            </v-list-item-avatar>
            <v-list-item-content>
              <v-list-item-title class="title">
                {{ user.name }}
              </v-list-item-title>
              <v-list-item-subtitle>
                {{ user.city }}{{ user.address }}
              </v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-flex>
      </v-layout>
    </v-list>
  </v-card>
</template>

<script>
export default {
  name: 'MyProfile',
  components: {},
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

<style scoped>
.card-layout {
  padding: -12px;
}
</style>
