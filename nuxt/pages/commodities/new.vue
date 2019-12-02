<template>
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
              ><input id="input-2466" placeholder="name" type="text" />
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
        undefined="true"
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
                >商品の個数</label
              ><input id="input-2466" placeholder="number" type="text" />
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
                >商品の値段</label
              ><input id="input-2466" placeholder="money" type="text" />
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

    <h4>貸出期間</h4>
    <div class="col-sm-6 col-12">
      <div
        class="v-input theme--light v-text-field v-text-field--is-booted v-select v-select--is-multi"
      >
        <div class="v-input__control">
          <div
            role="button"
            aria-haspopup="listbox"
            aria-expanded="false"
            aria-owns="list-1296"
            class="v-input__slot"
          >
            <div class="v-select__slot">
              <label
                for="input-1296"
                class="v-label theme--light"
                style="left: 0px; right: auto; position: absolute;"
                >datetime</label
              >
              <div class="v-select__selections">
                <input
                  id="input-1296"
                  readonly="readonly"
                  type="text"
                  aria-readonly="true"
                />
              </div>
              <div class="v-input__append-inner">
                <div class="v-input__icon v-input__icon--append">
                  <i
                    aria-hidden="true"
                    class="v-icon notranslate mdi mdi-menu-down theme--light"
                  ></i>
                </div>
              </div>
            </div>
            <div class="v-menu"></div>
          </div>
        </div>
      </div>
    </div>

    <h4>~</h4>

    <div class="col-sm-6 col-12">
      <div
        class="v-input theme--light v-text-field v-text-field--is-booted v-select v-select--is-multi"
      >
        <div class="v-input__control">
          <div
            role="button"
            aria-haspopup="listbox"
            aria-expanded="false"
            aria-owns="list-1296"
            class="v-input__slot"
          >
            <div class="v-select__slot">
              <label
                for="input-1296"
                class="v-label theme--light"
                style="left: 0px; right: auto; position: absolute;"
                >datetime</label
              >
              <div class="v-select__selections">
                <input
                  id="input-1296"
                  readonly="readonly"
                  type="text"
                  aria-readonly="true"
                />
              </div>
              <div class="v-input__append-inner">
                <div class="v-input__icon v-input__icon--append">
                  <i
                    aria-hidden="true"
                    class="v-icon notranslate mdi mdi-menu-down theme--light"
                  ></i>
                </div>
              </div>
            </div>
            <div class="v-menu"></div>
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
              ><input id="input-2466" placeholder="description" type="text" />
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
        undefined="true"
      >
        <span class="v-btn__content"><span>登録</span></span>
      </button>
    </div>
  </div>
</template>
<script>
export default {
  components: {},
  data() {
    return {
      commodity: {
        name: '',
        number: null,
        money: null,
        // 貸出日
        bDate: '',
        // 返却日
        aDate: '',
        // 詳細
        detail: ''
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
