<template>
    <div id="write">
        <header class="wrthead">
            <i class="el-icon-arrow-left wback" @click="back"></i>
            <h1>论坛</h1>
            <h3 class="suc" @click="success">发帖</h3>
        </header>
        <main class="wrtmain">
            <h2 class="wrtinfo">
                <img src="../../assets/imgs/portrait.jpg" />
                <p class="wrtname">Eddie</p>
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
            }
        },
        methods:{
            back:function(){
                this.$router.push({name:'forum'})
            },
            success:function(){
                axios({
                    url:'http://localhost:1232/inserWrt.php',
                    data: qs.stringify({header:this.header,details:this.textarea,type:this.value}),
                    method: 'post',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(res => {
                    console.log(res);
                })
            }
        }
    }
</script>