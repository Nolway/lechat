<template>
    <div class="message-area" ref="message">
        <message-component 
            v-for="message in messages" 
            :key="message.id" 
            :message="message">
        </message-component>      
    </div>
</template>

<script>

    import Event from '../event.js';

    export default {
        data() {
            return {
                messages: []
            }
        },
        mounted() {
            axios.get('/message').then((response) => {
                this.messages = response.data;
            });
            Event.$on('added_message', (message) => {
                this.messages.push(message);
                if(message.selfMessage) {
                    this.$refs.message.scrollTo(0,this.$refs.message.scrollHeight);
                }
            });
        }
    }
</script>
<style>
    .message-area {
        height: 600px;
        max-height: 600px;
        overflow-y: scroll;
        padding: 15px;
        border-bottom: 1px solid #eee;
    }
</style>