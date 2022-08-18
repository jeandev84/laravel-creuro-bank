/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue').default;


import Vue from "vue"
import App from './src/App'
import router from './src/router'
import store from './src/store'


Vue.config.productionTip = false;

new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});

/*
new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app')
*/
