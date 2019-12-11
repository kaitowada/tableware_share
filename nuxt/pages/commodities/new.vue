<template>
  <v-container>
    <div>
      <h1>商品登録</h1>
      <div class="col-sm-6 col-md-3 col-12">
        <div
          class="v-input theme--light v-text-field v-text-field--is-booted v-text-field--placeholder"
        >
          <div class="v-input__control">
            <div class="v-input__slot">
              <div class="v-text-field__slot">
                <label
                  for="input-2466"
                  class="v-label v-label--active theme--light"
                  style="left: 0px; right: auto; position: absolute;"
                  >商品の名前</label
                ><input
                  id="input-2466"
                  v-model="commodity.name"
                  placeholder="name"
                  type="text"
                />
              </div>
            </div>
            <div class="v-text-field__details">
              <div class="v-messages theme--light">
                <div class="v-messages__wrapper"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row align-center justify-center">
        <button
          type="button"
          class="v-btn v-btn--contained v-btn--tile theme--light elevation-0 v-size--default secondary"
        >
          <span class="v-btn__content"><span>＋ 画像を登録する</span></span>
        </button>
      </div>

      <div class="col-sm-6 col-md-3 col-12">
        <div
          class="v-input theme--light v-text-field v-text-field--is-booted v-text-field--placeholder"
        >
          <div class="v-input__control">
            <div class="v-input__slot">
              <div class="v-text-field__slot">
                <label
                  for="input-2466"
                  class="v-label v-label--active theme--light"
                  style="left: 0px; right: auto; position: absolute;"
                  >商品の値段</label
                ><input
                  id="input-2466"
                  v-model="commodity.price"
                  placeholder="price"
                  type="text"
                />
              </div>
            </div>
            <div class="v-text-field__details">
              <div class="v-messages theme--light">
                <div class="v-messages__wrapper"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 col-12">
        <div
          class="v-input theme--light v-text-field v-text-field--is-booted v-text-field--placeholder"
        >
          <div class="v-input__control">
            <div class="v-input__slot">
              <div class="v-text-field__slot">
                <label
                  for="input-2466"
                  class="v-label v-label--active theme--light"
                  style="left: 0px; right: auto; position: absolute;"
                  >商品の説明</label
                ><input
                  id="input-2466"
                  v-model="commodity.detail"
                  placeholder="description"
                  type="text"
                />
              </div>
            </div>
            <div class="v-text-field__details">
              <div class="v-messages theme--light">
                <div class="v-messages__wrapper"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row align-center justify-center">
        <button
          type="button"
          class="v-btn v-btn--contained v-btn--tile theme--light elevation-0 v-size--default secondary"
        >
          <span class="v-btn__content"><span>登録</span></span>
        </button>
      </div>
    </div>
  </v-container>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
  components: {},
  data() {
    return {
      user: {},
      commodity: {
        name: '',
        price: null,
        detail: ''
      }
    }
  },
  computed: {
    ...mapGetters('auth', ['getUser'])
  },
  watch: {},
  created() {
    this.user = this.getUser
  },
  methods: {}
}
</script>

<style scoped></style>
