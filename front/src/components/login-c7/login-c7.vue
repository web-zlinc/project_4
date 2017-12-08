<template>
    <div id="Login-c7">
        <header id="header">
            <div class="left el-icon-arrow-left"></div>
            <div class="right"></div>
        </header>
        <main id="main">
            <div id="imgBox">
                <img src="../../assets/imgs/timg.jpg"  />
            </div>
            <div id="login">
                <el-input  placeholder="请输入手机号" ></el-input>
                <el-input placeholder="请输入密码" type="password">
                </el-input>
                <el-button type="primary">学生登录</el-button>
                <span class="l-forget">忘记密码?</span>
            </div>
        </main>
        <footer id="footer">
            <div id="ftr-top"></div>
            <el-button id="ftr-botton" type="primary">学生注册</el-button>
        </footer>
    </div>
</template>

<script>
    import 'element-ui/lib/theme-chalk/icon.css'
    import './login-c7.scss'
    export default {
    }
</script>