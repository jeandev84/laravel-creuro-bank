<template>
    <div id="login_form">
        <h3>Вход</h3>
        <p v-if="loading">loading...</p>
        <p v-if="error" style="color:red">{{ error }}</p>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Введите е-майл" v-model="user.email">
        </div>
        <div class="form-group mt-3 mb-3">
            <input type="password" class="form-control" placeholder="Введите пароль" v-model="user.password">
        </div>
        <button class="btn btn-primary" @click="login">Войти</button>
    </div>
</template>

<script>

export default {
    name: 'Login',

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
    methods: {

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
