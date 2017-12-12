<template>
    <div>
        <!-- 工具栏 -->
        <ul class="h_toolbar">
          <li class="h_back">
            <el-button type="primary" style="margin-top: 15px;" plain @click="h_jobsBack">返回</el-button>
          </li>
        </ul>
        
        <table v-if="dataset.length>0">
            <thead>
                <tr>
                    <th v-for="(value,key) in dataset[0]" v-if="filter.indexOf(key)<0">{{key}}</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(object,index) in dataset">
                    <td v-for="(value,key) in object" v-if="filter.indexOf(key)<0">{{object[key]}}</td>
                    <td><el-button type="primary" icon="el-icon-edit"></el-button></td>
                    <td><el-button type="primary" icon="el-icon-delete" @click="del($event,index)"></el-button></el-button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script type="text/javascript">
    import './jobsSearch.scss';
    import datagrid from '../datagrid/datagrid.vue';
    import router from '../../router/index.js'
    import axios from 'axios';
    import qs from 'qs'

    export default{
        data:function(){
            return {
                filter:[],
                h_search_val: '',
                select: '',
                dataset:[],
            }
        },
        computed:{
            pro(){
                return this.$store.state.pro
            }
        },

        mounted:function(){
            // console.log(this.dataform.company)
            // console.log(this.dataform.company)
            
            axios({
                url:"http://10.3.135.251:2277/php/jobsSearch.php",
                method: 'post',
                // data: qs.stringify({jian:this.pro[1] , zhi: this.pro[0]}),
                data: qs.stringify({key: this.pro[1] , val: this.pro[0]}),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
            }).then(res=>{
                 this.show = false;
                 // 这里获取到了搜索的结果
                 this.dataset = res.data;
                })
        },
        methods:{
            h_jobsBack:function(){
                this.$router.push({name :'jobs'})
            },
            del:function(event,index){

                var delItem = this.dataset.splice(index, 1);
                this.dataset.splice(index, 0);
                // 获取当前路由
                let routePath = this.$route.path;
                let tab;
                let dataId;

                tab = 'jobs';
                dataId = delItem[0].jid
                
                // 获得删除当前行的uid
                // console.log(dataId)
                // 发起删除请求
                axios({
                    url:"http://localhost:2277/php/jobsRemove.php",
                    method: 'post',
                    data: qs.stringify({id:dataId,tab:tab}),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                    }
                }).then(res=>{
                     console.log(res)
                })
            }
        }
        
    }
</script>