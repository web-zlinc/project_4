<template>
    <div id="d_container">
        <div id="zd_one">
            <h1>{{obj.station}}</h1>
            <span>36小时前</span>
            <h2>'转正机会、优秀团队、发展空间大'</h2>
            <ul v-if="obj">
                <li v-for="(value,key) in obj" v-if="filter.indexOf(key)!=-1"><a href="">{{value.slice(0,2)}}</a></li>
                
            </ul>
            <div class="zdel">
                <img :src="obj.logo"/>
                <div class="delc">
                    <p class="p1">{{obj.company}}</p>
                    <p class="p2">制造/2000人以上</p>
                    <p class="p3">http://www.tesla.cn</p>
                </div>
                <i class="el-icon-arrow-right"></i>
            </div>
            
        </div>
        <div id="zd_two">
            <h2>职位描述</h2>
            <div class="cont">
                <h3>主要职责：</h3>
                <p>1.热爱媒体及互联网工作，喜欢视频类内容，对视频质量有一定判断力；</p>
                <p>2.本科或硕士在校生，专业不限，新闻传播类专业同学优先考虑；</p>
                <p>3.文字功底过硬，逻辑思维强悍，踏实认真，勤奋努力；</p>
                <p>4.可连续实习四个月以上的优先考虑</p>
            </div>
            <div class="cont">
                <h3>职位要求：</h3>
                <p>1.热爱媒体及互联网工作，喜欢视频类内容，对视频质量有一定判断力；</p>
                <p>2.本科或硕士在校生，专业不限，新闻传播类专业同学优先考虑；</p>
                <p>3.文字功底过硬，逻辑思维强悍，踏实认真，勤奋努力；</p>
                <p>4.可连续实习四个月以上的优先考虑</p>
            </div>
            <div class="acc">
                <p><i class="el-icon-location-outline"></i><span>工作地点</span></p>
                <p class="p2">{{obj.site}}</p>
                <p ><i class="el-icon-time"></i><span>截止日期:{{obj.time}}</span></p>
            </div>
        </div>
        <div id="zd_three">
            <el-button type="primary" plain class="btn1"><a href="">马上投递</a></el-button>
            <el-button type="primary" plain class="btn2"><a href="">收藏</a></el-button>
        </div>
    </div>
</template>
<script type="text/javascript">
    import './z_details.scss';

    import axios from 'axios';
    import qs from 'qs';

    export default{
        data:function(){
            return {
                obj:{},
                filter:['salary','duration','site','degree']
            }
        },
        mounted(){
            //接受index的参数
            var id=this.$route.query;
            axios({
                url:'http://localhost:3333/php/zindex.php',
                method: 'post',
                data: qs.stringify({jid:id}),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(res => {
                this.obj = res.data[0];
            })
        }
    }
</script>