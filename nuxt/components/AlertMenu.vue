<template>
  <v-card>
    <v-navigation-drawer
      @input="$emit('change-alert')"
      :value="alertDisplayFlg"
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
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'AlertMenu',
  components: {},
  props: {},
  data() {
    return {}
  },
  computed: {
    ...mapGetters('app', ['alertDisplayFlg'])
  },
  watch: {},
  async created() {},
  methods: {
    ...mapActions('app', { changeAlert: 'changeAlertDisplay' })
  }
}
</script>

<style scoped></style>
