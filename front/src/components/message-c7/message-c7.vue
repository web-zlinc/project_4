<template>
    <div id="message" v-if="show">
        <header id="mess-header">
            <h3 class="mess-titel">消息</h3>
            <i class="el-icon-menu menu"></i>
        </header>
         <ul id="mess-main">
            <li>
                <div class="mess-imgbox">
                    <img :src="imgUrl" />
                </div>
                <div class="mess-info" @click="service">
                    <h3>客服</h3>
                </div>
            </li>
            <li>
                <div class="mess-imgbox">
                    <img :src="imgUrl" />
                </div>
                <div class="mess-info">
                    <h3>论坛动态</h3>
                </div>
            </li>
        </ul>
        <Footers></Footers>
    </div>
</template>

<script>
    import './message-c7.scss';
    import Footers from '../footer/footer.vue';
    export default {
        data(){
            return {
                imgUrl:'src/assets/imgs/mess.png',
                show: true,
                username:window.localStorage.getItem('obj'),
            }
        },
        methods:{
            service:function(){
                 if(this.username == null ){
                    this.$message({
                        message:'打开失败，请先登录',
                        duration:1000,
                        type:'error',
                    })
                    return 
                }
                this.$router.push({name:'service'});
            }
        },
        components:{
            Footers,
        }
    }
</script>