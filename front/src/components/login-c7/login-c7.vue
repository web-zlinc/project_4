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
                <el-input  placeholder="请输入手机号" v-model="phone" ></el-input>
                <el-input placeholder="请输入密码" type="password" v-model="password">
                </el-input>
                <el-button type="primary" @click="Login">学生登录</el-button>
                <span class="l-forget">忘记密码?</span>
            </div>
        </main>
        <footer id="footer">
            <div id="ftr-top"></div>
            <el-button id="ftr-botton" type="primary" @click="register">学生注册</el-button>
        </footer>
    </div>
</template>

<script>
    import 'element-ui/lib/theme-chalk/icon.css'
    import './login-c7.scss'

    import axios from 'axios';
    import qs from 'qs';
    export default {
        data(){
            return {
                phone:'',
                password:'',
            }
        },
        methods :{
            Login(){
                axios({
                    url:'http://localhost:1232/user-c7.php',
                    method: 'post',
                    data: qs.stringify({phone: this.phone, password: this.password}),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(res => {
                    console.log(res.data[0].phone);
                    //传入window.localStorage.setItem保存信息id的值
                    window.localStorage.setItem('obj',res.data[0].phone);
                    //跳入首页
                    this.$router.push({name:'forum'})
                })
            },
            register(){
                this.$router.push({name:'register'})
            }
        }
    }
</script>