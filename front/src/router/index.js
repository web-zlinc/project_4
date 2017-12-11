import Vue from 'vue';
import VueRouter from 'vue-router';
import LoginComponent from '../components/login-c7/Login-c7.vue'
import RegisterComponent from '../components/register-c7/register-c7.vue'
import ForumComponent from '../components/forum-c7/forum-c7.vue'
import MessageComponent from '../components/message-c7/message-c7.vue'
import ServiceComponent from '../components/service-c7/service-c7.vue'
import ReplyComponent from '../components/reply-c7/reply-c7.vue'
import MineComponent from '../components/sm_mine/mine/mine.vue'
import RecordComponent from '../components/sm_mine/record/record.vue'
import InfoComponent from '../components/sm_mine/information/information.vue'
import CollectComponent from '../components/sm_mine/collect/collect.vue'
import PostComponent from '../components/sm_mine/post/post.vue'
Vue.use(VueRouter);
var router = new VueRouter({
    // mode: 'history',
    routes: [{
        path: '/mine',
        name: 'mine',
        component: MineComponent,
    }, {
        path: '/mine/record',
        name: 'record',
        component: RecordComponent
    }, {
        path: '/mine/info',
        name: 'info',
        component: InfoComponent
    }, {
        path: '/mine/collect',
        name: 'collect',
        component: CollectComponent
    }, {
        path: '/mine/post',
        name: 'post',
        component: PostComponent
    }, {
        path: '/register',
        name: 'register',
        component: RegisterComponent
    }, {
        path: '/forum',
        name: 'forum',
        component: ForumComponent
    }, {
        path: '/login',
        name: 'login',
        component: LoginComponent
    }, {
        path: '/message',
        name: 'message',
        component: MessageComponent,
    }, {
        path: '/service',
        name: 'service',
        component: ServiceComponent
    }, {
        path: '/reply',
        name: 'reply',
        component: ReplyComponent
    }]
})
export default router;