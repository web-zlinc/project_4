<template>
    <div id="forum">
        <header id="f-header">
            <span class="f-title">论坛</span>
            <i class="el-icon-search f-search"></i>
            <i class="el-icon-edit-outline f-edit" @click="write"></i>
        </header>
        <ul id="f-nav">
            <li><span :class="{fActive:1==num}" @click="hot">热门</span></li>
            <li><span :class="{fActive:2==num}" @click="headline">头条</span></li>
            <li><span :class="{fActive:3==num}" @click="strategy">攻略</span></li>
            <li><span :class="{fActive:4==num}" @click="low">吐槽</span></li>
            <li><span :class="{fActive:5==num}" @click="help">互助</span></li>
        </ul>
        <main id="f-main">
            <el-carousel trigger="click">
              <el-carousel-item v-for="(item,index) in dataset" :key="index">
                    <img :src="item" />
              </el-carousel-item>
            </el-carousel> 
            <ForumTemp :type="type" :key="type" v-on:ent="EneDet"></ForumTemp>
            <!-- <ul class="forum-list">
                <li v-for="(obj,index) in dataSet" :key="obj.uid" :id=
                "obj.uid">
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
            </ul> -->
        </main>
        <Footers></Footers>
    </div>
</template>

<script>
    import './forum-c7.scss';
    import ForumTemp from '../forum-temp/forum-temp.vue';
    import Footers from '../footer/footer.vue';
    export default {
        data(){
            return {
                dataset:[`src/assets/imgs/1.png`,`src/assets/imgs/2.png`,`src/assets/imgs/3.png`,`src/assets/imgs/4.png`,'../../../src/assets/imgs/5.png'],
                portrait:require('../../assets/imgs/portrait.jpg'),
                together:require('../../assets/imgs/toggeter.png'),
                type:"hot",
                num:1,
                username:window.localStorage.getItem('obj'),
            }
        },
        methods :{
            hot:function(){
                this.type = "hot";
                this.num = 1;
            },
            headline:function(){
                this.type= "headline";
                this.num = 2;
            },
            strategy:function(){
                this.type= 'strategy';
                this.num = 3;
            },
            low:function(){
                this.type= 'low';
                this.num = 4;
            },
            help:function(){
                this.type= 'help';
                this.num = 5;
            },
            EneDet:function(e){
                //获取当前id
                var id = e.dataset.id
                this.$router.push({path:'/forumdetails/' + id
                });
            },
            write:function(){
                if(this.username == null){
                    this.$message({
                        message:'打开失败，请先登录',
                        duration:1000,
                        type:'error',
                    })
                    return ;
                }
                this.$router.push({name:'write'});
            }
        },
        components:{
            ForumTemp,
            Footers,
        },
    }
</script>