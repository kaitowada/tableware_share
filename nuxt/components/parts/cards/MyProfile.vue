<template>
  <v-container :fluid="true" class="card-layout">
    <v-card :tile="true">
      <v-list>
        <v-layout wrap>
          <v-flex>
            <v-list-item>
              <v-list-item-avatar v-if="icon" size="60">
                <v-img :src="user.icon" />
              </v-list-item-avatar>
              <v-list-item-avatar v-else size="60">
                <v-icon size="60">mdi-account-circle</v-icon>
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
  </v-container>
</template>

<script>
export default {
  name: 'MyProfile',
  components: {},
  props: {
    name: {
      type: String,
      require: true,
      default: ''
    },
    icon: {
      type: String,
      require: true,
      default: ''
    },
    city: {
      type: String,
      require: true,
      default: ''
    },
    address: {
      type: String,
      require: true,
      default: ''
    }
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

<style scoped>
.card-layout {
  padding: 0;
}
</style>
