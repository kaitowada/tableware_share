<template>
  <div class="page-margin">
    <v-layout column wrap>
      <v-layout row wrap>
        <v-flex xs5>
          <v-img src="https://randomuser.me/api/portraits/women/85.jpg"></v-img>
        </v-flex>
        <v-flex xs5>
          <v-content>
            <v-container align-center="true">
              <v-layout column wrap>
                <v-flex xs4>
                  <p>平均評価</p>
                </v-flex>
                <v-flex xs4>
                  <v-rating
                    :value="getUserStar.star"
                    half-increments
                    color="#000000"
                    background-color="#000000"
                    readonly
                  ></v-rating>
                </v-flex>
              </v-layout>
            </v-container>
          </v-content>
        </v-flex>
      </v-layout>
      <v-flex xs12>
        <v-text-field
          :value="user.name"
          label="my name"
          readonly
          class="my-name-size"
        ></v-text-field>
      </v-flex>
    </v-layout>

    <v-form @submit.prevent="editAddress" class="form-layout">
      <v-layout wrap justify-center="true">
        <v-flex xs12>
          <v-text-field
            :value="user.city"
            label="福岡県福岡市"
            class="form-object-margin"
          ></v-text-field>
        </v-flex>
        <v-flex xs12>
          <v-text-field
            :value="user.address"
            label="博多区美野島"
            class="form-object-margin"
          ></v-text-field>
        </v-flex>
        <v-flex xs3>
          <v-btn color="#6200EE" type="submit" class="white--text">更新</v-btn>
        </v-flex>
      </v-layout>
    </v-form>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  components: {},
  data() {
    return {
      user: {
        name: 'my name',
        city: '福岡県福岡市',
        address: '博多区美野島'
      }
    }
  },
  computed: {
    ...mapGetters('evaluation', ['getUserStar'])
  },
  watch: {},
  async created() {
    const userId = 1
    await this.getStar(userId)
  },
  methods: {
    ...mapActions('evaluation', { getStar: 'getUserStar' }),
    editAddress() {
      console.log('onSubmitAddress')
    }
  }
}
</script>

<style scoped>
.page-margin {
  margin: 5px 5px 5px 5px;
}
.my-name-size {
  font-weight: bold;
  font-size: 25px;
}
.form-layout {
  margin-top: 50px;
  margin-bottom: 10px;
}
.form-object-margin {
  margin-top: 15px;
  margin-bottom: 10px;
}
</style>
