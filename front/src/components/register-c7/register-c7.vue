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
                <el-input placeholder="请输入手机号" v-model="mobile" @blur.once="check" ></el-input>
                <el-input  placeholder="请输入验证码" v-model="code" >
                </el-input>
                <el-input placeholder="请输入密码" type="password" v-model="password"></el-input>
                <el-button type="primary" @click="verifyCode" >学生注册</el-button>
                <span class="r-code" @click="getCode" v-text="obj"></span>
            </div>
            <p class="r-deal">注册代表您已同意Bleu兼职的用户协议</p>
        </main>
    </div>
</template>

<script>
    import './register-c7.scss';
    import axios from 'axios';
    import qs from 'qs';
    import md5 from 'js-md5';

    export default {
        data(){
            return {
                mobile:'',
                obj:'获取验证码',
                code:'',
                password:''
            }
        },
        methods:{
            randomNumber(min,max){
                return  parseInt(Math.random()*(max-min+1)+min);
            },
            check(){
                let reg = /^1[3,5,8]\d{9}$/;
                if(!reg.test(this.mobile)) {
                    this.$message({
                      showClose: true,
                      message: '请输入正确的手机号',
                      type: 'error'
                    });
                } else if(reg.test(this.mobile)) {
                    //发送post请求到后台查询结果
                    axios({
                        url:'http://localhost:1232/check-c7.php',
                        method: 'post',
                        data: qs.stringify({phone:this.mobile}),
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        }
                    }).then(res => {
                        if(res.data[0]){
                            this.$message({
                              showClose: true,
                              message: '该手机号码已存在',
                              type: 'error'
                            });
                        } else {
                            this.$message({
                              showClose: true,
                              message: '该号码尚未注册',
                              type: 'success'
                            });
                        }
                    })
                }
            },

            getCode(){
                // let first = this.randomNumber(0,9);
                // let third = this.randomNumber(0,9)
                // let second = String.fromCharCode(this.randomNumber(0,25)+65);
                // let fourth = String.fromCharCode(this.randomNumber(0,25)+65);
                // return this.obj = first + second + third + fourth;
                console.log(this);
                var date = new Date();
                var year = date.getFullYear();
                var mon = date.getMonth() + 1;
                var dates = date.getDate();
                var hour = date.getHours();
                var min = date.getMinutes();
                var sec = date.getSeconds();
                var accountSid = '4ba2b102bb8843cf910abc70ce0ae660';
                var token = '4fc2b75b7b53426e824ae0c24028d69f';
                var times =  year + mon + dates + hour + min + sec;
                var md55 = accountSid + token + times;
                axios({
                    url:'https://api.miaodiyun.com/20150822/industrySMS/sendSMS',
                    data: qs.stringify({
                        accountSid:accountSid,
                        to:this.mobile,
                        timestamp:times,
                        sig:md5(md55),
                        templateid:113994847,
                    }),
                    method: 'post',
                    headers: {
                        'Content-type':'application/x-www-form-urlencoded'
                    }
                }).then(res => {
                    console.log(res);
                })
            },
            verifyCode(){
                this.$message({
                  message: '注册成功',
                  type: 'success'
                });
                // 验证码相同则将数据写进数据库
                if(this.obj == this.code){
                    axios({
                        url:'http://localhost:1232/register-c7.php',
                        method: 'post',
                        data: qs.stringify({phone: this.mobile, password: this.password}),
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        }
                    }).then(res => {
                        //注册成功跳回登录页面
                        if(res.status==200){
                            this.$router.push({name:'login'});  
                        }
                    })
                }
            },
        },
    }
</script>