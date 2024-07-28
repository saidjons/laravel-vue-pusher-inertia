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
        window.Echo.private('status')
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
