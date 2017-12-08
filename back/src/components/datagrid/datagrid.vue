<template>
    <div>
        <table v-if="dataset.length>0">
            <thead>
                <tr>
                    <th v-for="(value,key) in dataset[0]" v-if="filter.indexOf(key)<0">{{key}}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(object,index) in dataset">
                    <td v-for="(value,key) in object" v-if="filter.indexOf(key)<0">{{object[key]}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- <el-table
      :data="dataset"
      style="width: 100%">

      <el-table-column v-for="(value,key) in dataset[0]" :prop="key" :label="key" width="100">
      </el-table-column>
    </el-table> -->
</template>

<script>
    import axios from 'axios';
    import qs from 'qs';

    export default{
        name: 'datagrid',

        data:function(){
            return{
                dataset:[]
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
        }
    }
</script>
