import Vue from 'vue';
import VueRouter from 'vue-router';

import LoginComponent from '../components/login/login.vue'
import BackgroundComponent from '../components/background/background.vue'
import UserInforComponent from '../components/userInformation/userInformation.vue'
import UserAddComponent from '../components/userAdd/userAdd.vue'
import UserSearchComponent from '../components/userSearch/userSearch.vue'
import UserEditComponent from '../components/userEdit/userEdit.vue'
import JobsComponent from '../components/jobs/jobs.vue'
import JobComponent from '../components/job/job.vue'
import JobsSearchComponent from '../components/jobsSearch/jobsSearch.vue'
import JobsEdit from '../components/jobsEdit/jobsEdit.vue'

Vue.use(VueRouter);

var router = new VueRouter({
    routes: [
        {
            path: '/' ||'/login',
            name: '' || 'login',
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
                    path: '/userAdd',
                    name: 'userAdd',
                    component: UserAddComponent
                },{
                    path: '/userSearch',
                    name: 'userSearch',
                    component: UserSearchComponent
                },{
                    path: '/userEdit',
                    name: 'userEdit',
                    component: UserEditComponent
                }, {
                    path: '/jobs',
                    name: 'jobs',
                    component: JobsComponent
                }, {
                    path: '/job',
                    name: 'job',
                    component: JobComponent
                }, {
                    path: '/jobsSearch',
                    name: 'jobsSearch',
                    component: JobsSearchComponent
                }, {
                    path: '/jobsEdit',
                    name: 'jobsEdit',
                    component: JobsEdit
                }
            ]
        }
             
    ]
})

export default router;