<template>
    <div class="mine_content">
        <header id="m_header">
            <div class="h_top">
                <img src="" alt="" />
            </div>
            <div class="h_center">
                <span class="toux" @click="info"></span> 
            </div>    
            <div class="h_bot">
                <showif v-if="!show"></showif>
                <showphone v-else></showphone>
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
         <Footers></Footers>
    </div>
</template>

<script>
import '../mine/mine.scss'
import $ from 'jquery'
import Footers from '../../footer/footer.vue';

    export default{
        data:function(){
            return {
              show:window.localStorage.getItem('obj')
            }
        },
        props:['username'],
        components:{
            Footers,
            'showif':{
                template:'<p class="nobody">请<a @click="Login">登录</a>/<a @click="reg">注册</a>账号</p>',
                methods: {
                    Login:function(){
                    this.$router.push({name:'login'});
                    },
                    reg(){
                        this.$router.push({name:'register'});
                    }
                }
            },
            'showphone':{
                template:'<p>{{this.$parent.show}}</p>'
            }
        },
        methods:{
            info:function(){
                if(this.show == null ){
                    this.$message({
                        message:'打开失败，请先登录',
                        duration:1000,
                        type:'error',
                    })
                    return 
                }
                this.$router.push({name:'info'})
            },
            post:function(){
                 if(this.show == null ){
                    this.$message({
                        message:'打开失败，请先登录',
                        duration:1000,
                        type:'error',
                    })
                    return 
                }
                this.$router.push({name:'post'})
            },
            record:function(){
                 if(this.show == null ){
                    this.$message({
                        message:'打开失败，请先登录',
                        duration:1000,
                        type:'error',
                    })
                    return 
                }
                this.$router.push({name:'record'})
            },
            collect:function(){
                 if(this.show == null ){
                    this.$message({
                        message:'打开失败，请先登录',
                        duration:1000,
                        type:'error',
                    })
                    return 
                }
                this.$router.push({name:'collect'})
            },
            exit:function(){
                 if(this.show == null ){
                    this.$message({
                        message:'打开失败，请先登录',
                        duration:1000,
                        type:'error',
                    })
                    return 
                }
                this.$router.push({name:'login'});
                window.localStorage.removeItem('obj');
            },
        },
    }
    
</script>