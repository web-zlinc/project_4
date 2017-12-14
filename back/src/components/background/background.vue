<template>
  <div id="app">
  <!-- 头部导航 -->
    <header class="header">
    </header>
    <div style="position: relative;height: 110px;width: 100%;background-color:#409EFF;">
      <h3 class="y_Partime">Management System For Partime</h3>
      <div class="y_exit">
        <el-button size="small" @click="y_exit">退出</el-button>
      </div>
    </div>

    <main>
          <!-- 左侧导航 -->
      <div class="main-left">
        <el-menu default-active="/activePublic" class="el-menu-vertical-demo" :router="true">
          <el-menu-item index="/userInformation" :class="{'isActive': active}">用户信息</el-menu-item>
          <el-menu-item index="/jobs" :class="{'isActive': !active}">招聘信息</el-menu-item>
        </el-menu>
      </div>

        <!-- 右侧主内容区 -->
      <div  class="main-right" >
        <!-- 这里存放子组件 -->
        <router-view></router-view>
      </div>
    </main>
  </div>
</template>

<script>
    import './background.scss';
    import '../../assets/common/base.css';
    import userInformation from '../userInformation/userInformation.vue';
    import userAdd from '../userAdd/userAdd.vue';
    import userSearch from '../userSearch/userSearch.vue';
    import jobsSearch from '../jobsSearch/jobsSearch.vue'

    import '../../router/index.js'

    export default {
      name: 'app',
      data: function (){
        return {
          active:true,
        }
      },
      mounted(){
        this.open();
      },
      methods:{
        y_exit:function(){
          console.log(this.$router)
          this.$router.push({name: 'login'})
        },
        open() {

          const h = this.$createElement;

          this.$notify({  
            title: `登录成功(ง •̀_•́)ง`,
            message: h('i', { style: 'color: teal'}, `在这里你能对User以及Jobs两个表格进行增删查改的操作`)
          });
        },
      },
      components:{
        userInformation:userInformation,
        userAdd:userAdd,
        userSearch:userSearch,
        jobsSearch:jobsSearch

      }
      
    }
</script>

