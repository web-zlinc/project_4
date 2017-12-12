<template>
    <ul class="forum-list">
        <li v-for="(obj,index) in dataSet" :key="obj.uid" :data-id="obj.uid" @click="counts" >
            <div class="fl-imgbox">
                    <img :src="obj.portrait"/>
            </div>
            <div class="fl-info">
                <h4 v-text="obj.nickname"></h4>
                <p v-text="obj.header"></p>
                <img :src="obj.photo" />
                <h5>
                    <span class="info-time" v-text="obj.forumtime"></span>
                    <i class="el-icon-star-off like"></i>
                    <span class="info-like" v-text="obj.likes"></span>
                    <i class="el-icon-news news"></i>
                        <span class="info-forum">37</span>
                </h5>
            </div>
        </li>
    </ul>
</template>

<script>
    import axios from 'axios';
    import qs from 'qs';
    export default {
        data(){
            return {
                dataSet:[],
            }
        },
        props:['type'],
        methods:{
            counts:function(evt){
                this.$emit('ent',evt.path[2]);
            }
        },
        mounted:function(){
            axios({
                url:'http://localhost:1232/forum-c7.php',
                method: 'post',
                data:qs.stringify({type:this.type}),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(res => {
                this.dataSet = res.data;
            })
        },
    }
</script>