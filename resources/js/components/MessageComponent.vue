<template>
    <div class="message" :class="{ 'self': message.selfMessage }">
        <strong class="user">{{ message.user.name }}</strong>
        <p class="body">{{ message.body }}</p>
        <span v-if="validateYoutubeUrl">
            <iframe width="420" height="315" :src="'http://www.youtube.com/embed/' + validateYoutubeUrl" frameborder="0" allowfullscreen></iframe>
        </span>
        <span v-if="validateImg">
            <img :src="message.body" />
        </span>
    </div>
</template>

<script>

    export default {
        props: ['message'],
        computed: {
            validateYoutubeUrl () {
                let p = /^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
                if (this.message.body.match(p)) {
                    return this.message.body.match(p)[1];
                }
                return false;
            },
            validateImg () {
                return(this.message.body.match(/\.(jpeg|jpg|gif|png)$/) != null);
            }

        }
    }
</script>

<style>
    .user {
        font-weight: 800;
    }
    .body {
        margin-bottom: 0;
        white-space: pre-wrap;
    }
    .message img {
        height: 100%;
        width: 100%;
        object-fit: contain;
    }
    .message {
        border-bottom: 1px solid #000000;
    }
    .self {
        background-color: #f0f0f0;
        padding: 10px;
    }
</style>
