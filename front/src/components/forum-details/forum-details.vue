<template>
    <div id="fumdetemp">
        <header class="fumdetheader">
            <i class="el-icon-arrow-left" @click="back"></i>
            <h3>帖子详情</h3>
        </header>
        <main class="fumdetmain" v-for="(obj,index) in dataset" :key="index">
            <h4 class="fmhead" v-text="obj.header">
            </h4>
            <h5 class="fminfo">
                <img :src="obj.portrait"/>
                <p class="fmname" v-text="obj.nickname"></p>
                <span class="fumdetime" v-text="obj.forumtime"></span>
            </h5>
            <p class="fmdet" v-text="obj.details"> 
            </p>
            <i class="el-icon-star-on likes" v-text="obj.likes"></i>
        </main>
        <footer class="fumdetftr">
            <el-input placeholder="回复帖子"></el-input>
        </footer>
    </div>
</template>

<script>
    import '../forum-details/forum-details.scss';
    import axios from 'axios';
    import qs from 'qs';
    export default {
        data(){
            return {
                uid:this.$route.params.id,
                dataset:[],
            }
        },
        mounted(){
            axios({
                url:'http://localhost:1232/forum-c7.php',
                method: 'post',
                data: qs.stringify({uid:this.uid}),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(res => {
                this.dataset = res.data;
                console.log(this.dataset)
            })
        },
        methods:{
            back:function(){
                this.$router.push({name:'forum'});
            }
        }
    }
</script>