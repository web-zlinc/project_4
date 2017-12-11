<template>
<div>
    <div class="mine_content">
        <header id="m_header">
            <div class="h_top">
                <img src="" alt="" />
            </div>
            <div class="h_center">
                <span class="toux" @click="info"></span> 
            </div>    
            <div class="h_bot">
                <p class="user" v-if='user'>{{username}}</p>
                <p v-if='!user'>请<router-link to="/login">登录</router-link>/<router-link to="/register">注册</router-link>账号</p>
                <p class="minebtn"><span @click="info()">完善信息</span></p>
            </div> 
        </header>
        <div id="m_main">
            <ul>
                <li @click="info"><p><i class="el-icon-edit"></i>个人资料<i class="el-icon-arrow-right"></i></p></li>
                <li @click="post"><p><i class="el-icon-bell"></i>我的帖子<i class="el-icon-arrow-right"></i></p></li>     
            </ul>
            <ul>
                <li @click="collect"><p><i class="el-icon-star-on"></i>我的收藏<i class="el-icon-arrow-right"></i></p></li>
                <li @click="record"><p><i class="el-icon-view"></i>兼职记录<i class="el-icon-arrow-right"></i></p></li>
                <li @click="exit"><p><i class="el-icon-setting"></i>退出账户<i class="el-icon-arrow-right"></i></p></li>   
            </ul>
         </div>
    </div>
    <router-view :username="this.username"></router-view>
</div>
</template>

<script>
import '../mine/mine.scss'
import $ from 'jquery'

    export default{
        data:function(){
            return {
                user:false
            }
        },
        props:['username'],
        methods:{
            info:function(){
                this.$router.push({name:'info'})
            },
            post:function(){
                this.$router.push({name:'post'})
            },
            record:function(){
                this.$router.push({name:'record'})
            },
            collect:function(){
                this.$router.push({name:'collect'})
            },
            exit:function(){
                this.$router.push({name:'login'})
            }
        }
    }
     
    
</script>