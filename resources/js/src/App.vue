<template>
      <div>
          <nav class="navbar navbar-expand-lg navbar-light">
              <div class="container">
                  <a class="navbar-brand" href="/">Credit Europa Bank</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="menu">
                      <ul class="navbar-nav mr-auto" v-if="!authenticated">
                          <router-link class="nav-link" :to="{name: 'login'}">Вход</router-link>
                      </ul>
                      <ul class="navbar-nav mr-auto" v-if="authenticated">
                          <li class="nav-item active">
                              <router-link class="nav-link" :to="{name: 'parkings'}">Стоянки</router-link>
                          </li>
                          <li class="nav-item" style="cursor: pointer;">
                              <a class="nav-link" @click="logout">Выход</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>
          <div class="container pt-5">
              <router-view/>
          </div>
      </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
    data() {
        return {
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

</style>
