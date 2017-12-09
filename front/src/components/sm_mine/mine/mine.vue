<template>
<div>
    <div class="mine_content" v-if="mine">
        <header id="m_header">
            <div class="h_top">
                <img src="" alt="" />
            </div>
            <div class="h_center">
                <span class="toux" @click="info"></span> 
            </div>    
            <div class="h_bot">
                <p class="user">{{username}}</p>
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
                <li><p><i class="el-icon-setting"></i>退出账户<i class="el-icon-arrow-right"></i></p></li>   
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
                mine:true
                // username:''

            }
        },
        props:['username'],
        methods:{
            info:function(){
                this.mine=false;
                this.$router.push({name:'info'})
            },
            post:function(){
                this.mine=false;
                this.$router.push({name:'post'})
            },
            record:function(){
                this.mine=false;
                this.$router.push({name:'record'})
            },
            collect:function(){
                this.mine=false;
                this.$router.push({name:'collect'})
            }
        }
    }
    $(function(){
      var username=$('.user').html();
      if(username==""){
        $('.user').html('请<a class="login" href="#/login">登录</a>/<a class="register" href="#/register">注册</a>账号')
      }
    })
     
    
</script>