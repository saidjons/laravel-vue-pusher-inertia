<template>
    <div class="flex messages">
        <ul>
            <li v-for="item in messages" :key="item.message">{{ item.message }}
                - <i>{{ item.user }}</i></li>
        </ul>
    </div>
    <div id="chat" class="flex flex-row">
        <input v-model="message" type="text">
        <button @click="sendMessage">send</button>
    </div>
</template>

<script>
import {warn} from '@vue/runtime-core';

export default {
    mounted() {
        Echo.channel('chat-room.1')
            .listen('ChatMessageWasReceived', (e) => {
                console.log(e.user, e.chatMessage);
            });

    },
    methods: {
        listenForChanges() {
            Echo.channel('liked')
                .listen('status.1', post => {
                    console.log(post)


                })
        },
        sendMessage() {

            window.axios.post('/message', {
                headers: {
                    'X-CSRF-TOKEN': this.csrf,
                    'Authorization': 'Bearer ' + this.token,
                },
                message: this.message
            })
                .then((response) => {
                    this.message = '';
                });

        }
    },
    data() {
        return {
            token: null,
            csrf: null,
            messages: [{
                user: 'saidjon',
                message: 'hello'
            }],
            message: '',
        }
    }
}
</script>
