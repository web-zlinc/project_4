<template>
    <div id="container">
        <div class="z_top">
            <span>全国</span>
            <i class='io el-icon-arrow-down'></i>
            <i class="it el-icon-search"></i>
            <input type="text" placeholder="500强机会" @click="skip"/>
        </div>
        <div class="z_banner">

            <el-carousel indicator-position="outside">
                <el-carousel-item v-for="item in 6" :key="item">
                    <img src="../../assets/zb1.png"/>
                </el-carousel-item>
            </el-carousel>
        </div>
        <div class="z_nav">
            <ul>
                <li>
                    <img src="../../assets/zn1.png" alt="" />
                    <a href="#">一周两天</a>
                </li>
                <li>
                    <img src="../../assets/zn2.png" alt="" />
                    <a href="#">一周两天</a>
                </li>
                <li>
                    <img src="../../assets/zn3.png" alt="" />
                    <a href="#">一周两天</a>
                </li>
                <li>
                    <img src="../../assets/zn4.png" alt="" />
                    <a href="#">一周两天</a>
                </li>

            </ul>
        </div>
        <div class="z_main">
            <ul v-if="dataset.length > 0" >
                <li :gid="obj.jid" v-for="(obj, index) in dataset" @click="handleClick(obj.jid)">
                    <img :src="obj.logo" />
                    <div class="zmr">
                        <p class="one">
                            <span class='fl'>{{obj.station}}</span>
                            <span class="fr">{{obj.time.slice(5,10)}}更新</span>
                        </p>
                        <p class="two">{{obj.company}}</p>
                        <p class="three">
                            <span class="t1 el-icon-location-outline">{{obj.site.slice(0,2)}}</span> 
                            <span class="t2 el-icon-time">{{obj.rate}}</span>
                            <span class="t3">{{obj.salary}}</span>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
        <z_footer></z_footer>
    </div>
</template>

<script type="text/javascript">
    import './z_index.scss';
    import footer from '../footer/footer.vue'
    import axios from 'axios';
    import qs from 'qs';

    import z_footer from '../footer/footer.vue';
    import z_search from '../z_search/z_search.vue'
    import $ from 'jquery';

    export default{
        data:function(){
            return {
                dataset: [],
                id:''

            }
        },
        components:{
            z_footer:footer
        },
        methods:{
            skip:function(){
                this.$router.push({name: 'search'});
            },
            handleClick(idx){
                this.$router.push({
                    name: 'details',
                    query:idx
                });
            } 

        },
        mounted(){
            axios({
                url:'http://localhost:3333/php/zindex.php',
                method: 'post',
                data: qs.stringify({recommend:'true'}),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(res => {
                this.dataset = res.data;
            })
        }
    }

    


</script>
<style>
  .el-carousel__item img{
    color: #475669;
    font-size: 18px;
    opacity: 0.75;
    line-height: 300px;
    margin: 0;
  }
  
  .el-carousel__item:nth-child(2n) {
    background-color: #99a9bf;
  }
  
  .el-carousel__item:nth-child(2n+1) {
    background-color: #d3dce6;
  }
</style>