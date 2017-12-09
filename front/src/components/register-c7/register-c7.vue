<template>
    <div id="register">
        <header id="r-header">
            <div class="r-left">
                <i class="el-icon-close r-icon"></i>
                <span class="r-active">手机注册</span>
            </div>
            <div class="r-right">
                <span>邮箱注册</span>
            </div>
        </header>
        <main id="r-main">
            <div class="form-group">
                <el-input  placeholder="请输入手机号" ></el-input>
                <el-input  placeholder="请输入验证码" >
                </el-input>
                <el-input placeholder="请输入密码" type="password"></el-input>
                <el-button type="primary">学生注册</el-button>
                <span class="r-code">获取验证码</span>
            </div>
            <p class="r-deal">注册代表您已同意Bleu兼职的用户协议</p>
        </main>
    </div>
</template>

<script>
    import './register-c7.scss'
    export default {

    }
</script>