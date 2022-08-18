<template>
      <div>
          <nav v-if="authenticated" class="navbar navbar-expand-lg navbar-light">
              <div class="container">

                  <a class="navbar-brand" href="#">Credit Europa Bank</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">

                      <ul class="navbar-nav mr-auto">
                          <!-- <router-link v-if="!authenticated" :to="{name: 'login'}">Вход</router-link> -->
                          <li class="nav-item active">
                              <router-link class="nav-link" :to="{name: 'parkings'}">Стоянки</router-link>
                          </li>
                      </ul>
                      <ul class="navbar-nav">
                          <li class="nav-item">
                              <a class="nav-link" @click="logout">Выход</a>
                          </li>
                      </ul>

                  </div>

                  <p v-if="loading">loading...</p>

                  <div class="errors">
                      <p v-if="error" style="color: red;">{{ error }}</p>
                  </div>
              </div>
          </nav>


          <div id="login_form" v-if="!authenticated">
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
          </div>

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
