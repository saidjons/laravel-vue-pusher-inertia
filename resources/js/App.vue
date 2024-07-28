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
    window.Echo.channel('messege')
      .listen('MessegeSent', (e) => {
        alert(e.message)
        this.messages.push(e.message);
      });

      Echo.channel('messege')
      .listen('.server.created', function (e) {
        alert(e.message)
        this.messages.push(e.message);
      });


      window.Echo.channel('status')
        .listen('StatusLiked', (e) => {
             alert(e.message)
             console.log(e.message)
        });
        window.Echo.private('chat')
            .listen('MessageSent', (e) => {
                alert(e.message)
            });


            window.Echo.private('match')
            .listen('GoalScored', (e) => {
             console.log("match",e)

                alert(e.message)
            });

  }
};
</script>

<style>
/* Your styles here */
</style>
