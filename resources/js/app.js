require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './App.vue';
import { routes } from './router';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import VCalendar from 'v-calendar';

window.Swal = require('sweetalert2');

Vue.use(VueSweetalert2);

Vue.use(VCalendar, {
    componentPrefix: 'vc'
});

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(VueRouter);

Vue.component('app', App);

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'text-yellow-600',
    routes: routes
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('jwt') == null) {
            next({
                path: '/login',
                params: { nextUrl: to.fullPath }
            });
        } else {
            let user = JSON.parse(localStorage.getItem('user'));

            if (to.matched.some(record => record.meta.Admin)) {
                if (user.Admin == 1) {
                    next();
                } else {
                    next({ name: 'notfound' });
                }
            }

            if (to.matched.some(record => record.meta.Secretary)) {
                if (user.Secretary == 1) {
                    next();
                } else {
                    next({ name: 'notfound' });
                }
            }

            if (to.matched.some(record => record.meta.Manager)) {
                if (user.Manager == 1) {
                    next();
                } else {
                    next({ name: 'notfound' });
                }
            }

            if (to.matched.some(record => record.meta.Customer)) {
                if (user.Customer == 1) {
                    next();
                } else {
                    next({ name: 'notfound' });
                }
            }
            next();
        }
    } else {
        next();
    }
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App)
});
