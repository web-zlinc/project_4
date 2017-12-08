import Vue from 'vue';
import VueRouter from 'vue-router';
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
            path:'/record',
            name:'record',
            component:RecordComponent
        },
        {
            path:'/info',
            name:'info',
            component:InfoComponent
        }
    ]
})

export default router;