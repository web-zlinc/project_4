<template>
    <div class="container">
    <header id="m_header">
        <div class="h_top">
            <img src="" alt="" />
        </div>
        <div class="h_center">
            <span class="toux"></span> 
        </div>    
        <div class="h_bot">
            <p>username</p>
            <p><span>完善信息</span></p>
        </div> 
    </header>
    <div id="m_main">
        <ul>
            <li @click="info"><p><i class="el-icon-edit"></i>个人资料<i class="el-icon-arrow-right"></i></p></li>
            <li><p><i class="el-icon-bell"></i>我的帖子<i class="el-icon-arrow-right"></i></p></li>     
        </ul>
        <ul>
            <li><p><i class="el-icon-star-on"></i>我的收藏<i class="el-icon-arrow-right"></i></p></li>
            <li @click="record"><p><i class="el-icon-view"></i>兼职记录<i class="el-icon-arrow-right"></i></p></li>
            <li @click="m_return"><p><i class="el-icon-setting"></i>退出账户<i class="el-icon-arrow-right"></i></p></li>   
        </ul>
       
    </div>
    </div>
</template>

<script>
    import './mine.scss'
    export default{
        methods:{
            record:function(){
                this.$router.push({name:'record'});
            },
            info:function(){
                this.$router.push({name:'info'});
            }

        }
    }
</script>