<template>
    <div class="y_datagrid">
        <table v-if="dataset.length>0">
            <thead>
                <tr>
                    <th v-for="(value,key) in dataset[0]" v-if="filter.indexOf(key)<0">{{change[key]}}</th>
                    <th>编辑</th>
                    <th>删除</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(object,index) in dataset">
                    <td v-for="(value,key) in object" v-if="filter.indexOf(key)<0">{{object[key]}}</td>
                    <td><el-button type="primary" icon="el-icon-edit" @click="edit($event,index)"></el-button></td>
                    <td><el-button type="primary" icon="el-icon-delete" @click="del($event,index)"></el-button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import './datagrid.scss';
    import axios from 'axios';
    import qs from 'qs';
    import router from '../../router/index.js';


    export default{
        name: 'datagrid',

        data:function(){
            return{
                dataset:[],
                
            }
        },
        props:['api','filter','change'],
        mounted:function(){
            axios({
                url:this.api,
                headers:{
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(res=>{
                console.log(res)
                this.dataset=res.data;
            })
        },
        methods:{
            // 点击删除要删除当前tr的数据
            del:function(event,index){

                var delItem = this.dataset.splice(index, 1);
                this.dataset.splice(index, 0);
                // 根据路由对相应的表格进行删除操作
                let _url;
                let routePath = this.$route.path;
                if(routePath === '/userInformation'){
                    _url = "http://10.3.135.246:333/back/php/userRemove.php";
                    var _uid = delItem[0].id;
                }else if(routePath === '/jobs'){
                    _url = "http://10.3.135.251:2277/php/jobsRemove.php";
                    var _uid = delItem[0].jid;
                }

                // 获得删除当前行的uid
                // var uid = delItem[0].id;
                // console.log(delItem)
                console.log(_uid)
                console.log(_url)
                // 发起删除请求
                axios({
                    url: _url,
                    method: 'post',
                    data: qs.stringify({uid:_uid}),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                    }
                }).then(res=>{
                    this.successPro(_uid);
                })
            },
            // 点击编辑跳转至编辑组件进行编辑
            edit:function(event,index){
                // 需要将当前行中的值存起来
                let routePath = this.$route.path;
                if(routePath === '/userInformation'){

                    var editInfor = this.dataset[index];
                    this.$store.commit('editInfor',editInfor);
                    this.$router.push({name:'userEdit'});

                }else if(routePath === '/jobs'){

                    let jobsEditInfor = this.dataset[index];
                    this.$store.commit('jobsEditInfor',jobsEditInfor);
                    this.$router.push({name: 'jobsEdit'});
                }
            },
            successPro: function(a){
                this.$notify({
                    title: '删除成功',
                    message: `删除了当前表格中id为${a}的数据`,
                    type: 'success'
                });
            }
        },
    }
</script>
