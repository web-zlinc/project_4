<template>
    <div id="reply">
        <header class="rep-header">
            <i class="el-icon-arrow-left rep-icon"></i>
            <h3 class="rep-head-active">回复我的</h3>
            <h3>我回复的</h3>
        </header>
        <main class="rep-main">
            <!-- <router-view></router-view> -->
            <!-- <RepchildComponent></RepchildComponent> -->
            <ReptempComponent></ReptempComponent>
        </main>
        <footer class="rep-footer"></footer>
    </div>
</template>

<script>
    import './reply-c7.scss';
    import RepchildComponent from '../rep-children/rep-children.vue'
    import ReptempComponent from '../rep-children1/rep-children1.vue';
    export default {
        data(){
            return {}
        },
        components:{
            RepchildComponent,
            ReptempComponent
        }
    }
</script>