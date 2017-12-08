<template>
    <div>
    <div class="mine_content">
    <header id="m_header">
        <div class="h_top">
            <img src="" alt="" />
        </div>
        <div class="h_center">
            <span class="toux"></span> 
        </div>    
        <div class="h_bot">
            <p class="user" :data-id="username">{{username}}</p>
            <p class="minebtn"><span >完善信息</span></p>
        </div> 
    </header>
    <div id="m_main">
        <ul>
            <li><router-link to="/mine/info"><p><i class="el-icon-edit"></i>个人资料<i class="el-icon-arrow-right"></i></p></router-link></li>
            <li><router-link to="/mine/post"><p><i class="el-icon-bell"></i>我的帖子<i class="el-icon-arrow-right"></i></p></router-link></li>     
        </ul>
        <ul>
            <li><router-link to="/mine/collect"><p><i class="el-icon-star-on"></i>我的收藏<i class="el-icon-arrow-right"></i></p></router-link></li>
            <li><router-link to="/mine/record"><p><i class="el-icon-view"></i>兼职记录<i class="el-icon-arrow-right"></i></p></router-link></li>
            <li><p><i class="el-icon-setting"></i>退出账户<i class="el-icon-arrow-right"></i></p></li>   
        </ul>
     </div>  
     </div>
    <router-view v-if="mine"></router-view>
    </div>
    
</template>

<script>
    import './mine.scss'
    import $ from 'jquery'
    export default{
        data:function(){
            return {
             mine:false   
            }
        },
        props:['username'],
        methods:{

        }
    }
    $(function(){
      var username=$('.user').html();
      if(username==""){
        $('.user').html('请<a class="login" href="">登录</a>/<a class="register">注册</a>账号')
      }
      $('#m_main').on('click','a',function(){
            $('.mine_content').remove();
            this.mine='true';
      })
     
    })
     
    
</script>