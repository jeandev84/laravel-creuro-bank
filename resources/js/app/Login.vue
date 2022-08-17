<template>
      <div class="login">
          <form action="">
              <div class="form-group">
                  <input type="email" class="form-control" placeholder="Введите е-майл" v-model="credentials.email">
              </div>
              <div class="form-group mt-3 mb-3">
                  <input type="password" class="form-control" placeholder="Введите пароль" v-model="credentials.password">
              </div>
              <button class="btn btn-primary" @click.prevent="login">Войти</button>
          </form>
      </div>
</template>

<script>

import axios from 'axios';


export default {
    name: "Login",
    data() {
        return {
            credentials: {
                email: '',
                password: ''
            },
            loading : true
        }
    },
    methods: {

        login() {

             axios.post('/api/v1/login', this.credentials)
                  .then(res => {
                      if (res.data.success) {
                           console.log(res.data)
                      }
                  })
                 .catch(err => {
                      console.log('Error!')
                 })
        }
    }
}
</script>

<style scoped>
   .login {
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
