
/**
 * Routing
*/

import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from "./Home";
import Dashboard from "./Dashboard";
import Login from "./Login";



Vue.use(VueRouter);


export const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/login',
        component: Login
    },
    {
        path: '/dashboard',
        component: Dashboard
    },
];
