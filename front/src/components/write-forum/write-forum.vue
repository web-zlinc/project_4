<template>
    <div id="write">
        <header class="wrthead">
            <i class="el-icon-arrow-left wback" @click="back"></i>
            <h1>论坛</h1>
            <h3 class="suc" @click="success">发帖</h3>
        </header>
        <main class="wrtmain">
            <h2 class="wrtinfo" v-for="(obj,index) in data" :key="index" :ref="index">
                <img :src="obj.portrait" />
                <p class="wrtname" v-text="obj.nickname"></p>
                <div id="sel">
                    <el-select v-model="value" placeholder="请选择">
                    <el-option
                      v-for="item in dataset"
                      :key="item"
                      :value="item">
                      <span style="float:left;font-size:36px;">{{item}}</span>
                    </el-option>
                    </el-select>
                </div>
            </h2>
            <el-input v-model="header" placeholder="请输入标题"></el-input>
            <el-input
              type="textarea"
              :autosize="{ minRows: 2, maxRows: 4}"
              placeholder="请输入内容"
              v-model="textarea">
            </el-input>
        </main>
    </div>
</template>

<script>
    import '../write-forum/write-forum.scss';
    import axios from 'axios';
    import qs from 'qs';
    export default {
        data(){
            return {
                header:'',
                textarea:'',
                dataset:['hot','low','help','headline','strategy'],
                value:'',
                username:window.localStorage.getItem('obj'),
                data:[],
            }
        },
        methods:{
            back:function(){
                this.$router.push({name:'forum'})
            },
            success:function(){
                if(this.header == '' || this.textarea =='' ){
                    this.$alert('主题或者主题内容不能为空', '提示信息', {
                        confirmButtonText: '确定',
                        callback: action => {
                        this.$message({
                          type: 'success',
                          message: `点击确定`
                        });
                      }
                    });
                }else{
                    axios({
                        url:'http://localhost:1232/inserWrt.php',
                        data: qs.stringify({
                            header:this.header,
                            details:this.textarea,
                            type:this.value,
                            phone:this.username,
                            nickname:this.data[0].nickname,
                        }),
                        method: 'post',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        }
                    }).then(res => {
                        console.log(res);
                    })   
                }
                this.$router.push({name:'forum'});
            }
        },
        mounted(){
            axios({
                url:'http://localhost:1232/check-c7.php',
                data: qs.stringify({phone:this.username}),
                method: 'post',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(res => {
                this.data = res.data;
                console.log(this.data)
            })
        }
    }
</script>