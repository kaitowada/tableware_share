<template>
  <v-container>
    <div class="my-commodities__header">
      <v-text-field v-model="productName" label="出品中商品" />
    </div>
    <div class="my-commodities__body">
      <template>
        <div></div>
      </template>
      <template>
        <ul class="my-commodities__list">
          <template v-for="item in items">
            <li
              @click="clickItem(item.id)"
              v-ripple
              :key="item.id"
              :class="`_${item.type}`"
              class="my-commodities__list-item"
            >
              <div class="my-commodities__comodity">
                <img
                  class="my-commodities__comodity-image"
                  src="https://pbs.twimg.com/profile_images/1077172356487905281/BB3FaAc9_400x400.jpg"
                  alt=""
                />
                <div class="comodity-item">
                  <div class="comodity-item__title">{{ item.title }}</div>
                  <div class="comodity-item__note">
                    {{ item.type | filterType }}
                  </div>
                  <div class="comodity-item__money">
                    ¥ {{ item.money | filterMoney }}
                  </div>
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
const TYPES = Object.freeze({
  request: '取引依頼あり',
  waitPayment: '支払い待ち',
  waitRating: '評価待ち',
  done: '取引完了'
})
export default {
  filters: {
    filterType(type) {
      if (type) {
        return TYPES[type]
      }
      return '　'
    },
    filterMoney(money) {
      return String(money).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, '$1,')
    }
  },
  data() {
    return {
      productName: ''
    }
  },
  computed: {
    items() {
      return [
        {
          id: 1,
          title: '【冴えカノ】絵',
          image:
            'https://pbs.twimg.com/profile_images/1077172356487905281/BB3FaAc9_400x400.jpg',
          type: '',
          money: '12000'
        },
        {
          id: 2,
          title: '【冴えカノ】絵',
          image:
            'https://pbs.twimg.com/profile_images/1077172356487905281/BB3FaAc9_400x400.jpg',
          type: 'request',
          money: '12000'
        },
        {
          id: 3,
          title: '【冴えカノ】絵',
          image:
            'https://pbs.twimg.com/profile_images/1077172356487905281/BB3FaAc9_400x400.jpg',
          type: 'waitPayment',
          money: '12000'
        },
        {
          id: 4,
          title: '【冴えカノ】絵',
          image:
            'https://pbs.twimg.com/profile_images/1077172356487905281/BB3FaAc9_400x400.jpg',
          type: 'waitRating',
          money: '12000'
        },
        {
          id: 5,
          title: '【冴えカノ】絵',
          image:
            'https://pbs.twimg.com/profile_images/1077172356487905281/BB3FaAc9_400x400.jpg',
          type: 'done',
          money: '12000'
        }
      ]
    }
  },
  methods: {
    clickItem(id) {
      console.log(`clicked! id: ${id}`)
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
