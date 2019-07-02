<template>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">Utilisateurs</div>
            <div class="card-body">
                <div class="users" v-for="user in users" :key="user.id">
                    <span>{{ user.name }}</span>
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
                users: []
            }
        },

        mounted() {
            Event.$on('users.here', (users) => {
                this.users = users;
            })
            .$on('users.joined', (user) => {
                this.users.unshift(user);
            })
            .$on('users.left', (user) => {
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
