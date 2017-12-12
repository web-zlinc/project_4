<template>
    <div class="y_datagrid">
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
                    <td><el-button type="primary" icon="el-icon-edit" @click="edit"></el-button></td>
                    <td><el-button type="primary" icon="el-icon-delete" @click="del($event,index)"></el-button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- <el-table :data="dataset" style="width: 100%">
        
        <el-table-column v-for="(value,key) in dataset[0]" :prop="key" :label="key">
        </el-table-column>
    </el-table> -->

    <!-- <el-table :data="tableData" border style="width: 100%">
        <el-table-column prop="date" label="日期" width="180"></el-table-column>
        <el-table-column prop="name" label="姓名" width="180"></el-table-column>
        <el-table-column prop="address" label="地址"></el-table-column>
    </el-table> -->
</template>

<script>
    import './datagrid.scss';
    import axios from 'axios';
    import qs from 'qs';

    export default{
        name: 'datagrid',

        data:function(){
            return{
                dataset:[],
            }
        },
        props:['api','filter'],
        mounted:function(){
            axios({
                url:this.api,
                headers:{
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(res=>{
                this.dataset=res.data;
            })
        },
        methods:{
            // 点击删除要删除当前tr的数据
            del:function(event,index){
                this.dataset.splice(index, 0);
                var delItem = this.dataset.splice(index, 1);
                // 获得删除当前行的uid
                var uid = delItem[0].uid;
                console.log(uid)
                // 发起删除请求
                axios({
                    url:"http://10.3.135.246:333/back/php/userRemove.php",
                    method: 'post',
                    data: qs.stringify({uid:uid}),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                    }
                }).then(res=>{
                     console.log(res)
                    })
            }
            // 点击编辑跳转至编辑组件进行编辑
        }
    }
</script>
