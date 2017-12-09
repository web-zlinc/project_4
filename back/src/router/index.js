import Vue from 'vue';
import VueRouter from 'vue-router';

import LoginComponent from '../components/login/login.vue'
import BackgroundComponent from '../components/background/background.vue'

Vue.use(VueRouter);

var router = new VueRouter({
    routes: [
        {
            path: '/',
            name: '',
            component: LoginComponent
        },
        {
            path: '/background',
            name: 'background',
            component: BackgroundComponent
        }       
    ]
})

export default router;