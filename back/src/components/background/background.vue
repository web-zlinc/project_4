<template>
  <div id="app">
  <!-- 头部导航 -->
    <header class="header">
    </header>
    <div style="position: relative;height: 110px;width: 100%;background-color:#7fe;">
      <h3 class="y_Partime">Partime</h3>
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

    import '../../router/index.js'

    export default {
      name: 'app',
      data: function (){
        return {
          active:true,
          input3: '',
          input4: '',
          input5: '',
          select: ''
        }
      },
      methods:{
        y_exit:function(){
          console.log(this.$router)
          this.$router.push({name: 'login'})
        }
      },
      components:{
        userInformation:userInformation,
        userAdd:userAdd,
        userSearch:userSearch,

      }
      
    }
</script>

