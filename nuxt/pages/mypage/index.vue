<template>
  <v-container>
    <div class="page-margin">
      <v-layout column wrap>
        <v-layout row wrap>
          <v-flex xs5>
            <div @click="setImage">
              <template v-if="false">
                <v-list-item-avatar size="170">
                  <v-img :src="getImage" />
                </v-list-item-avatar>
              </template>
              <template v-else>
                <!--                <v-icon size="170">mdi-account-circle</v-icon>-->
                <v-list-item-avatar size="170">
                  <v-img
                    src="https://pbs.twimg.com/profile_images/1077172356487905281/BB3FaAc9_400x400.jpg"
                  />
                </v-list-item-avatar>
              </template>
            </div>
            <input
              id="finish_image"
              @change="setImageFinish"
              type="file"
              class="file-input"
              name="photo"
              accept=".png,.jpeg,.jpg,.PNG,.JPEG,.JPG"
            />
          </v-flex>
          <v-flex xs5>
            <v-content class="side-margin">
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
                    />
                  </v-flex>
                </v-layout>
              </v-container>
            </v-content>
          </v-flex>
        </v-layout>
        <v-flex xs12>
          <v-text-field
            v-model="user.name"
            label="my name"
            class="my-name-size"
          />
        </v-flex>
      </v-layout>

      <v-form @submit.prevent="editAddress" class="form-layout">
        <v-layout wrap justify-center="true">
          <v-flex xs12>
            <v-text-field
              v-model="user.city"
              label="福岡県福岡市"
              class="form-object-margin"
            />
          </v-flex>
          <v-flex xs12>
            <v-text-field
              v-model="user.address"
              label="博多区美野島"
              class="form-object-margin"
            />
          </v-flex>
          <v-flex xs3>
            <v-btn
              @click="isUpdateAddress"
              color="#6200EE"
              type="submit"
              class="white--text"
            >
              更新
            </v-btn>
          </v-flex>
        </v-layout>
      </v-form>
    </div>
  </v-container>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
export default {
  components: {},
  data() {
    return {
      user: {}
    }
  },
  computed: {
    ...mapGetters('evaluation', ['getUserStar']),
    ...mapGetters('auth', ['getUser']),
    getImage() {
      console.log('url')
      return `https://tableware-back.herokuapp.com/${this.getUser.image_path}`
    }
  },
  watch: {},
  async created() {
    this.user = this.getUser
    if (!this.user.name) {
      this.user.name = 'No Name'
    }
    await this.getStar(this.user.id)
  },
  methods: {
    ...mapActions('evaluation', { getStar: 'getUserStar' }),
    ...mapActions('auth', {
      updateAddress: 'updateUserAddress',
      updateImage: 'updateUserImage'
    }),
    editAddress() {
      console.log('onSubmitAddress')
    },
    isUpdateAddress() {
      const data = {
        postData: {
          name: this.user.name,
          city: this.user.city,
          address: this.user.address
        },
        userId: this.user.id
      }
      this.updateAddress(data)
    },
    setImage() {
      const input = document.querySelector('#finish_image')
      input.click()
      console.log('setImage')
    },
    setImageFinish(event) {
      console.log('setImageFinish')
      const files = event.target.files || event.dataTransfer.files
      if (files.length > 0) {
        const file = files[0]
        console.log('file', file)
        const params = new FormData()
        params.append('file', file)
        const data = {
          userId: this.user.id,
          image: params
        }
        this.updateImage(data)
      }
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
.file-input {
  display: none;
  z-index: 1;
}
.side-margin {
  margin-left: 10px;
}
</style>
