import Vue from 'vue';
import VueRouter from 'vue-router';

import LoginComponent from '../components/login/login.vue'
import BackgroundComponent from '../components/background/background.vue'
// import DatagridComponent from '../components/datagrid/datagrid.vue'
import UserInforComponent from '../components/userInformation/userInformation.vue'
import JobsComponent from '../components/jobs/jobs.vue'

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
            component: BackgroundComponent,
            children:[
                {
                    path: '/userInformation',
                    name: 'userInformation',
                    component: UserInforComponent
        
                },{
                    path: '/jobs',
                    name: 'jobs',
                    component: JobsComponent
                }
            ]
        },
        // {
        //     path: '/datagrid',
        //     name: 'datagrid',
        //     component: DatagridComponent
        // },
             
    ]
})

export default router;