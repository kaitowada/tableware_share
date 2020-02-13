<template>
  <v-container>
    <div class="my-commodities__header">
      <v-text-field v-model="productName" label="商品検索" />
    </div>
    <div class="my-commodities__body">
      <template>
        <div></div>
      </template>
      <template>
        <ul class="my-commodities__list">
          <template v-for="item in getCommodities">
            <li
              @click="clickItem(item.id)"
              v-ripple
              :key="item.id"
              class="my-commodities__list-item"
            >
              <div class="my-commodities__comodity">
                <img
                  src="https://pbs.twimg.com/profile_images/1077172356487905281/BB3FaAc9_400x400.jpg"
                  class="my-commodities__comodity-image"
                  alt=""
                />
                <!--                <v-icon v-else size="70" class="my-commodities__comodity-image">-->
                <!--                  mdi-alert-box-outline-->
                <!--                </v-icon>-->
                <div class="comodity-item">
                  <div class="comodity-item__title">{{ item.name }}</div>
                  <div class="comodity-item__note">
                    {{ item.description }}
                  </div>
                  <div class="comodity-item__money">¥ {{ item.price }}</div>
                </div>
              </div>
            </li>
          </template>
        </ul>
      </template>
    </div>
  </v-container>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  data() {
    return {
      productName: ''
    }
  },
  computed: {
    ...mapGetters('commodity', ['getCommodities']),
    ...mapGetters('auth', ['getUser'])
  },
  watch: {},
  async created() {
    await this.getCommodity(this.getUser.id)
  },
  methods: {
    ...mapActions('commodity', { getCommodity: 'getCommoditiesList' }),
    clickItem(id) {
      this.$router.push({
        path: `/commodities/${id}`
      })
    }
  }
}
</script>

<style lang="scss" scoped>
.my-commodities__header {
  color: #1b1b1b;
}
.my-commodities__body {
  padding: 8px;
}
.my-commodities__list {
  box-shadow: 0 1px 4px #b9b9b9;
  list-style: none;
  padding: 0;
  margin: 0;
}
.my-commodities__list-item {
  padding: 12px 18px;
  transition: background-color 0.3s ease;
  border-bottom: solid 1px #b9b9b9;
  &:hover {
    background-color: #eeeded;
  }
  &:last-child {
    border-bottom: none;
  }
  &._request {
    background-color: #fff7fd;
    &:hover {
      background-color: darken(#fff7fd, 5%);
    }
  }
  &._waitPayment {
    background-color: #fcffe6;
    &:hover {
      background-color: darken(#fcffe6, 10%);
    }
  }
  &._waitRating {
    background-color: #e6ffec;
    &:hover {
      background-color: darken(#e6ffec, 8%);
    }
  }
  &._done {
    background-color: #cbcbcb;
    &:hover {
      background-color: darken(#cbcbcb, 8%);
    }
  }
}
.my-commodities__comodity {
  display: grid;
  grid-template-columns: 60px 1fr;
  grid-gap: 12px;
}
.my-commodities__comodity-image {
  object-fit: cover;
  width: 60px;
  height: 60px;
  border-radius: 8px;
  box-shadow: 0 2px 6px #b9b9b9;
}
.comodity-item__note {
  color: #9e9e9e;
}
.comodity-item__money {
  text-align: right;
}
</style>
