<template>
  <div id="app">
  <!-- 头部导航 -->
    <header class="header">
    </header>
    <div style="position: relative;height: 110px;width: 100%;background-color:#7fe;">
      <h3 class="y_Partime">Partime</h3>
      <div class="y_exit">
        <el-button size="small">退出</el-button>
      </div>
    </div>

    <!-- 工具栏 -->
    <ul class="y_toolbar">
      <li class="y_search">
        <div style="margin-top: 15px;">
        <el-input placeholder="请输入内容" v-model="input5" class="input-with-select">
          <el-select v-model="select" slot="prepend" placeholder="请选择">
            <el-option label="姓名" value="1"></el-option>
            <el-option label="地址" value="2"></el-option>
            <el-option label="电话" value="3"></el-option>
          </el-select>
          <el-button slot="append" icon="el-icon-search"></el-button>
        </el-input>
      </div>
      </li>
      <li class="y_add">
        <el-button type="primary" style="margin-top: 15px;" plain>添加</el-button>
      </li>
    </ul>

    <main>
          <!-- 左侧导航 -->
      <div class="main-left">
        <el-menu default-active="/activePublic" class="el-menu-vertical-demo" :router="true">
          <el-menu-item index="/userInformation" :class="{'isActive': active}">用户管理</el-menu-item>
          <el-menu-item index="/jobs" :class="{'isActive': !active}">招聘信息</el-menu-item>
        </el-menu>
      </div>

        <!-- 右侧主内容区 -->
      <div  class="main-right" >
        <!-- <userInformation></userInformation> -->
        <router-view></router-view>
      </div>
    </main>
  </div>
</template>

<script>
    import './background.scss';
    import '../../assets/common/base.css';
    import userInformation from '../userInformation/userInformation.vue'

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
      components:{
        userInformation:userInformation
        
      }
      
    }
</script>

