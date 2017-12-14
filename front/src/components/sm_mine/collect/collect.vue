<template>
    <div class="rec_content">
        <div id="r_header">       
            <p><i class="el-icon-arrow-left" @click="c_return"></i>我的收藏</p>
        </div>
        <el-tabs id="r_nav" v-model="activeName">
        <el-tab-pane label="收藏职位" name="first"></el-tab-pane>
        <el-tab-pane label="收藏公司" name="second"></el-tab-pane>
        <div id="r_main">
            <div class="sm_main">
            <ul v-if="dataset.length > 0" >
                <li :gid="obj.jid" v-for="(obj, index) in dataset" @click="handleClick(obj.jid)">
                    <img :src="'../../'+obj.logo" />
                    <div class="zmr">
                        <p class="one">
                            <span class='fl'>{{obj.station}}</span>
                            <span class="fr">X</span>
                        </p>
                        <p class="two">{{obj.company}}</p>
                        <p class="three">
                            <span class="t1 el-icon-location-outline">{{obj.site.slice(0,4)}}</span> 
                            <span class="t2 el-icon-time">{{obj.rate}}</span>
                            <span class="t3">{{obj.salary}}</span>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
            <nothing v-if="data"></nothing>
        </div>
        </el-tabs>
        
    </div>
</template>

<script>
    import '../record/record.scss'
    import nothing from '../no-data/no-data.vue'
    import $ from 'jquery'
    import axios from 'axios'
    import qs from 'qs'
    export default{
        data:function(){
            return {
                activeName: 'first',
                data:false,
                dataset:[]
            }
        },
        mounted(){
             axios({
                url:'http://localhost:1232/collect.php',
                method: 'post',
                data: qs.stringify({phone:window.localStorage.getItem('obj')}),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(res => {
                this.dataset = res.data;
            })
        },
        methods:{
            c_return:function(){
                this.$router.back(-1);
            },
            handleClick:function(idx){
                this.$router.push({
                    name: 'details',
                    query:idx
                });
            }
           
        },
        components:{
            nothing:nothing
            
        }
    }
    $(function(){
        $('.fr').click(function(e){
            e.stopPropagation();
            console.log(666)

        })
    })
</script>