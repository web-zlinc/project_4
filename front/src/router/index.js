import Vue from 'vue';
import VueRouter from 'vue-router';

import LoginComponent from '../components/login-c7/Login-c7.vue'
import RegisterComponent from '../components/register-c7/register-c7.vue'
import ForumComponent from '../components/forum-c7/forum-c7.vue'
import MessageComponent from '../components/message-c7/message-c7.vue'
import ServiceComponent from '../components/service-c7/service-c7.vue'
import ReplyComponent from '../components/reply-c7/reply-c7.vue'
import RepchildComponent from '../components/rep-children/rep-children.vue'
import ForumdetailsComponent from '../components/forum-details/forum-details.vue'
import WriteforumComponent from '../components/write-forum/write-forum.vue'


import MineComponent from '../components/sm_mine/mine/mine.vue'
import RecordComponent from '../components/sm_mine/record/record.vue'
import InfoComponent from '../components/sm_mine/info/information.vue'

Vue.use(VueRouter);

var router = new VueRouter({
    routes: [
        {
            path: '/mine',
            name: 'mine',
            component: MineComponent
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
            path: '/login',
            name: 'login',
            component: LoginComponent
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
            component: ReplyComponent,
        },
        {
            path:'/record',
            name:'record',
            component:RecordComponent
        },
        {
            path:'/info',
            name:'info',
            component:InfoComponent
        },
        {
            path:'/forumdetails/:id',
            name:'forumdetails',
            component:ForumdetailsComponent,
        },
        {
            path:'/write',
            name:'write',
            component:WriteforumComponent,
        }
    ]
})

export default router;