<template>
  <v-card>
    <v-navigation-drawer
      v-model="drawer"
      :right="true"
      :hide-overlay="true"
      temporary
      fixed
    >
      <v-list :two-line="true" :nav="true" :flat="true">
        <v-subheader>
          お知らせ
        </v-subheader>
        <v-list-item-group>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title>
                ●●の品で取引をしています
              </v-list-item-title>
              <v-list-item-subtitle>
                取引を進めてください。
              </v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </v-card>
</template>

<script>
export default {
  name: 'AlertMenu',
  components: {},
  props: {
    drawer: {
      type: Boolean,
      required: true,
      default: false
    }
  },
  data() {
    return {}
  },
  computed: {},
  watch: {},
  async created() {},
  methods: {}
}
</script>

<style scoped></style>
