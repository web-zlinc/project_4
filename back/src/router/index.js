import Vue from 'vue';
import VueRouter from 'vue-router';

import LoginComponent from '../components/login/login.vue'
import InformationComponent from '../components/students/students.vue'

Vue.use(VueRouter);

var router = new VueRouter({
    routes: [
        {
            path: '/login',
            name: 'login',
            component: LoginComponent
        },
        {
            path: '/information',
            name: 'information',
            component: InformationComponent
        }       
    ]
})

export default router;