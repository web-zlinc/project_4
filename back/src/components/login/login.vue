
<template>
    <div>
        <el-form  status-icon  label-width="100px" class="demo-ruleForm">
            <el-form-item label="用户名" prop="pass">
                <el-input type="text" v-model="username" auto-complete="off"></el-input>
            </el-form-item>
            <el-form-item label="密码" prop="checkPass">
                <el-input type="password" v-model="password" auto-complete="off"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="submitForm">登录</el-button>
            </el-form-item>
        </el-form>
        <spinner v-if="show"></spinner>
    </div>
</template>
<script>
    import './login.scss'
    import axios from 'axios';
    import superagent from 'superagent';
    import spinner from '../spinner/spinner.vue';
    import qs from 'qs'
    export default {
        data() {
            return {
              username: '',
              password: '',
              show: false,
                
            };  
        },
        methods: {
            submitForm() {
                this.show = true;
                axios({
                   url: 'http://10.3.135.246:333/back/php/user.php',
                   method: 'post',
                   data: qs.stringify({username: this.username, password: this.password}),
                   headers: {
                     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                   }
                }).then(res=>{
                     this.show=false;
                    if(res.data.length>0){
                        console.log(this)
                        this.$router.push({name: 'background'});
                    }else{
                         alert('用户名或密码不正确');
                    }
                        
                });
            }
            
        },
        components:{
           spinner:spinner
        }
         
    }
</script>