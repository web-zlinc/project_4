<template>
    <div id="d_container">
        <div id="zd_one">
            <i class="el-icon-arrow-left z-back" @click="back"></i>
            <h1>{{obj.station}}</h1>
            <h2>'转正机会、优秀团队、发展空间大'</h2>
            <ul v-if="obj">
                <li v-for="(value,key) in obj" v-if="filter.indexOf(key)!=-1"><a href="">{{value}}</a></li>
                
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
                <p>1.{{obj.jd}}</p>
                <p>2.{{obj.jd}}</p>
                <p>3.{{obj.jd}}</p>
                <p>4.{{obj.jd}}</p>
            </div>
            <div class="cont">
                <h3>职位要求：</h3>
                <p>1.{{obj.jd}}</p>
                <p>2.{{obj.jd}}</p>
                <p>3.{{obj.jd}}</p>
                <p>4.{{obj.jd}}</p>
            </div>
            <div class="acc">
                <p><i class="el-icon-location-outline"></i><span>工作地点</span></p>
                <p class="p2">{{obj.site}}</p>
                <p ><i class="el-icon-time"></i><span>截止日期:{{obj.time}}</span></p>
            </div>
        </div>
        <div id="zd_three">
            <el-button type="primary" plain class="btn1"><a>马上投递</a></el-button>
            <el-button type="primary" plain class="btn2"><a>收藏</a></el-button>
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
                url:'http://localhost:1232/zindex.php',
                method: 'post',
                data: qs.stringify({jid:id}),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(res => {
                this.obj = res.data[0];
            })
        },
        methods:{
            back(){
               this.$router.back(-1);
            }
        }
    }
</script>