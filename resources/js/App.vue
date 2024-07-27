<template>
  <div id="app">
    <h1>Messages</h1>
    <ul>
      <li v-for="message in messages" :key="message">{{ message }}</li>
    </ul>

    <Chat/>
  </div>
</template>

<script>
import Chat from "./Component/Chat.vue"
export default {
  name: 'App',
  components:{Chat}
  ,
  data() {
    return {
      messages: []
    };
  },
  mounted() {
    window.Echo.channel('chat-room.1')
      .listen('MessegeSent', (e) => {
        alert(e.message)
        this.messages.push(e.message);
      });
  }
};
</script>

<style>
/* Your styles here */
</style>
