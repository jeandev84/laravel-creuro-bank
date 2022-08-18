<template>
      <h1>Login</h1>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    data() {
        return {
            user: {
                email: null,
                password: null
            },
            loading: false,
            error: false,
        }
    },
    computed: {
        ...mapGetters({
            authenticated: 'authenticated'
        })
    },
    methods: {
        async logout() {
            this.loading = true;
            try {
                await this.$store.dispatch('logout');
                await this.$router.push({ name: 'login' })
            } catch (error) {
                this.error = error;
            } finally {
                this.loading = false;
            }
        },
        async login() {
            this.error = null;
            try {
                await this.$store.dispatch('login', this.user);
                await this.$router.push({ name: 'parkings' });
            } catch (error) {
                this.error = error;
            } finally {
                this.loading = false;
            }
        }
    }
}
</script>

<style scoped>

#login_form {
    background-color: #fff;
    border: 1px solid #eee;
    padding: 10px;
    margin: 50px auto;
    width: 500px;
}

button {
    /*display: block;*/
    margin: 0 auto;
}
</style>
