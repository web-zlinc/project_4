import Vue from 'vue';
import VueRouter from 'vue-router';

import LoginComponent from '../components/login/Login.vue'
import StudentComponent from '../components/students/students.vue'
import ProductComponent from '../components/products/products.vue'

Vue.use(VueRouter);

var router = new VueRouter({
    routes: [
        {
            path: '/login',
            name: 'login',
            component: LoginComponent
        },
        {
            path: '/students',
            name: 'student',
            component: StudentComponent
        },
        {
            path: '/products',
            name: 'product',
            component: ProductComponent
        }        
    ]
})

export default router;