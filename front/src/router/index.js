import Vue from 'vue';
import VueRouter from 'vue-router';

import LoginComponent from '../components/login-c7/Login-c7.vue'
import RegisterComponent from '../components/register-c7/register-c7.vue'
import ForumComponent from '../components/forum-c7/forum-c7.vue'
import MessageComponent from '../components/message-c7/message-c7.vue'
import ServiceComponent from '../components/service-c7/service-c7.vue'
import ReplyComponent from '../components/reply-c7/reply-c7.vue'


Vue.use(VueRouter);

var router = new VueRouter({
    routes: [
        {
            path: '/login',
            name: 'login',
            component: LoginComponent
        },
        {
            path: '/register',
            name: 'register',
            component: RegisterComponent
        },
        {
            path: '/forum',
            name: 'forum',
            component: ForumComponent
        },
        {
            path: '/message',
            name: 'message',
            component: MessageComponent,
        },
        {
            path: '/service',
            name: 'service',
            component: ServiceComponent      
        },
        {
            path: '/reply',
            name: 'reply',
            component: ReplyComponent
        }
    ]
})

export default router;