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
        <footer id="mess-footer"></footer>
    </div>
</template>

<script>
    import './message-c7.scss';
    export default {
        data(){
            return {
                imgUrl:'src/assets/imgs/mess.png',
                show: true,
            }
        },
        methods:{
            service:function(){
                this.$router.push({name:'service'});
            }
        }
    }
</script>