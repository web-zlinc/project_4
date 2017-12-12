<template>
    <div>
        <!-- 工具栏 -->
        <ul class="y_toolbar">
          <li class="y_back">
            <el-button type="primary" style="margin-top: 15px;" plain @click="y_userBack">返回</el-button>
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
                    <td><el-button type="primary" icon="el-icon-delete"></el-button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script type="text/javascript">
    import './userSearch.scss';
    import datagrid from '../datagrid/datagrid.vue';
    import router from '../../router/index.js'
    import axios from 'axios';
    import qs from 'qs'

    export default{
        data:function(){
            return {
                filter:[],
                y_search_val: '',
                select: '',
                dataset:[]

            }
        },
        computed:{
            pro(){
                return this.$store.state.pro 
            }
        },

        mounted:function(){
            axios({
                url:"http://10.3.135.246:333/back/php/userSearch.php",
                method: 'post',
                data: qs.stringify({jian:this.pro[1] , zhi: this.pro[0]}),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
            }).then(res=>{
                 this.show=false;
                 // 这里获取到了搜索的结果
                 this.dataset=res.data;
                })
        },
        methods:{
            y_userSearch:function(){
                // 发起请求成功就跳转至搜索结果的页面
                this.$router.push({name :'userSearch'})
            },
            y_userBack:function(){
                this.$router.push({name :'userInformation'})
            }
        }
        
    }
</script>