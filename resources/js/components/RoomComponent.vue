<template>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">Salons</div>
            <div class="card-body">
                <a href="#">Accueil</a>
                <div class="users" v-for="room in rooms" :key="room.id">
                    <a href="#">{{ room.name }}</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Event from '../event.js';

    export default {

        data() {
            return {
                rooms: []
            }
        },

        mounted() {
            Event.$on('rooms.joined', (room) => {

            })
            .$on('room.left', (room) => {
                this.users = this.users.filter(u => {
                    return u.id != user.id
                });
            });
        }
    }
</script>

<style>
    .users {
        background-color: #fff;
        border-radius: 3px;
    }
</style>
