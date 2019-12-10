<template>
  <v-container :fluid="true">
    <v-layout :align-center="true" :justify-center="true" :fill-height="true">
      <div>
        <slot name="mainText" />
      </div>
      <div class="margin-layout">
        <slot name="refusal" />
      </div>
      <div>
        <slot name="permission" />
      </div>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  name: 'ConfirmPanel'
}
</script>

<style lang="scss" scoped>
.margin-layout {
  margin-left: 5px;
  margin-right: 5px;
}
</style>
