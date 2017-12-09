import Vue from 'vue';
import VueRouter from 'vue-router';
import MineComponent from '../components/sm_mine/mine.vue'
import RecordComponent from '../components/sm_mine/record.vue'
import InfoComponent from '../components/sm_mine/information.vue'
import CollectComponent from '../components/sm_mine/collect.vue'
import PostComponent from '../components/sm_mine/post.vue'
Vue.use(VueRouter);
var router = new VueRouter({
    // mode: 'history',
    routes: [
        {
            path: '/mine',
            name: 'mine',
            component: MineComponent,
            children:[
                {
                   path:'record',
                    name:'record',
                    component:RecordComponent 
                },
                {
                    path:'info',
                    name:'info',
                    component:InfoComponent  
                },
                {
                    path:'collect',
                    name:'collect',
                    component:CollectComponent
                },
                {
                    path:'post',
                    name:'post',
                    component:PostComponent
                }
            ]
        }
    ]
})

export default router;

