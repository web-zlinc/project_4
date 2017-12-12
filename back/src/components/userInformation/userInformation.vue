<template>
    <div>
        <!-- 工具栏 -->
        <ul class="y_toolbar">
          <li class="y_search">
            <div style="margin-top: 15px;">
            <el-input placeholder="请输入内容" v-model="y_search_val" class="input-with-select">
              <el-select v-model="select" slot="prepend" placeholder="请选择">
                <el-option label="姓名" value="name"></el-option>
                <el-option label="地址" value="city"></el-option>
                <el-option label="电话" value="phone"></el-option>
              </el-select>

              <!-- 将输入框中的值传给userSearch -->
                <el-button slot="append" icon="el-icon-search" @click="y_userSearch">
                    
                </el-button>

            </el-input>
          </div>
          </li>
          <li class="y_add">
            <el-button type="primary" style="margin-top: 15px;" plain @click="y_userAdd">添加</el-button>
          </li>
          <!-- <li class="page">
            <el-button-group>
                <el-button type="primary" icon="el-icon-arrow-left">上一页</el-button>
                <el-button type="primary">下一页<i class="el-icon-arrow-right el-icon--right"></i></el-button>
            </el-button-group>
          </li> -->
        </ul>

        <datagrid api="http://10.3.135.246:333/back/php/userInformation.php" :filter="filter"></datagrid>
        <spinner v-if="show"></spinner>
    </div>
</template>

<script type="text/javascript">
    import './userInformation.scss';
    import spinner from '../spinner/spinner.vue';
    import datagrid from '../datagrid/datagrid.vue';
    import router from '../../router/index.js';
    import axios from 'axios';
    import qs from 'qs'


    export default{
        data:function(){
            return {
                filter:['password','email','portrait'],
                y_search_val: '',
                select: '',
                show:false
            }
        },  
        methods:{
            y_userSearch:function(){
                // 相当于将输入框中的值存放在store中
                this.$store.commit('searchInfor',[this.y_search_val,this.select]);
                this.show = true;
                this.$router.push({name :'userSearch'})
                
            },
            y_userAdd:function(){
                this.$router.push({name :'userAdd'})
            }
        },
        components:{
            spinner:spinner,
            datagrid:datagrid,
        }
        
    }
</script>