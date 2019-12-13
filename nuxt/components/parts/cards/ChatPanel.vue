<template>
  <div>
    <v-card>
      <v-container :fluid="true">
        <div v-for="chat in getChats">
          <template v-if="userId === chat.user_id">
            <v-layout :justify-end="true" class="text-margin">
              <v-flex xs6>
                <v-card :shaped="true" color="#a8fffb">
                  <v-card-text>
                    {{ chat.text }}
                  </v-card-text>
                </v-card>
              </v-flex>
            </v-layout>
          </template>
          <template v-else>
            <v-layout :justify-start="true" class="text-margin">
              <v-flex xs6>
                <v-card :shaped="true">
                  <v-card-text>
                    {{ chat.text }}
                  </v-card-text>
                </v-card>
              </v-flex>
            </v-layout>
          </template>
        </div>
      </v-container>
    </v-card>
    <v-layout :justify-center="true" row class="chat-box-style">
      <v-flex xs9>
        <v-text-field v-model="postMessage" single-line solo />
      </v-flex>
      <v-flex>
        <v-btn @click="chatPost" large>
          送信
        </v-btn>
      </v-flex>
    </v-layout>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'ChatPanel',
  props: {
    dealingId: {
      type: Number,
      require: true,
      default: null
    },
    userId: {
      type: Number,
      require: true,
      default: null
    }
  },
  data() {
    return {
      postMessage: '',
      intervalId: null
    }
  },
  computed: {
    ...mapGetters('chat', ['getChats'])
  },
  watch: {},
  async created() {
    await this.getDealingChat(this.dealingId)
  },
  mounted() {
    this.intervalId = setInterval(
      async function() {
        await this.getDealingChat(this.dealingId)
        await this.getDealingStatus(this.dealingId)
      }.bind(this),
      5000
    )
  },
  beforeDestroy() {
    console.log('clearInterval')
    clearInterval(this.intervalId)
  },
  methods: {
    ...mapActions('chat', {
      getDealingChat: 'getTransactionChat',
      saveMessage: 'saveMessageLog'
    }),
    ...mapActions('dealing', { getDealingStatus: 'getDealing' }),
    async chatPost() {
      console.log('onClick 送信')
      const params = {
        user_id: this.userId,
        dealing_id: this.dealingId,
        text: this.postMessage
      }
      this.postMessage = ''
      await this.saveMessage(params)
    }
  }
}
</script>

<style scoped>
.text-margin {
  margin: 10px;
}
.chat-box-style {
  margin-left: 5px;
}
</style>
