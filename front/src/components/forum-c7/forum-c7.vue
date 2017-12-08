<template>
    <div id="forum">
        <header id="f-header">
            <span class="f-title">论坛</span>
            <i class="el-icon-search f-search"></i>
            <i class="el-icon-edit-outline f-edit"></i>
        </header>
        <ul id="f-nav">
            <li><span class="f-active">热门</span></li>
            <li><span>头条</span></li>
            <li><span>攻略</span></li>
            <li><span>吐槽</span></li>
            <li><span>互助</span></li>
        </ul>
        <main id="f-main">
            <el-carousel trigger="click">
              <el-carousel-item v-for="(item,index) in dataset" :key="index">
                    <img :src="item" />
              </el-carousel-item>
            </el-carousel>
            <ul class="forum-list"></ul>
        </main>
        <footer id="f-footer"></footer>
    </div>
</template>

<script>
    import './forum-c7.scss';
    export default {
        data(){
            return {
                dataset:[`src/assets/imgs/1.png`,`src/assets/imgs/2.png`,`src/assets/imgs/3.png`,`src/assets/imgs/4.png`,'../../../src/assets/imgs/5.png'],
            }
        }
    }
</script>