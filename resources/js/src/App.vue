<template>
      <div>
          <nav v-if="authenticated">
              <!-- <router-link v-if="!authenticated" :to="{name: 'login'}">Вход</router-link> -->
              <router-link v-if="authenticated"  :to="{name: 'parkings'}">Стоянки</router-link>
              <button v-if="authenticated" @click="logout">Выход</button>

              <p v-if="loading">loading...</p>

              <div class="errors">
                  <p v-if="error" style="color: red;">{{ error }}</p>
              </div>
          </nav>


          <form action="" id="login_form" v-else>
              <div class="container">
                  <h3>Credit Europa Bank</h3>
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
          </form>

      </div>
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
  nav {
      background-color: #fff;
      border: 1px solid #eee;
      padding: 10px;
      margin: 50px auto;
  }

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
