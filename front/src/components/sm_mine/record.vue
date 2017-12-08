<template>
    <div class="rec_content">
    <div id="r_header"><p><i class="el-icon-arrow-left" @click="r_return"></i>兼职记录</p></div>
     <el-tabs id="r_nav" v-model="activeName" @tab-click="handleClick">
        <el-tab-pane label="全部" name="first"></el-tab-pane>
        <el-tab-pane label="面试记录" name="second"></el-tab-pane>
         <el-tab-pane label="不合适" name="third"></el-tab-pane>
        <div id="r_main">
            <nothing></nothing>
        </div>
        </el-tabs>
    </div>
</template>
<script>
    import './record.scss'
    import nothing from './no-data.vue'
    export default{
        data:function(){
        return {
            activeName: 'first'
        }
        },
        methods:{
            r_return:function(){
                this.$router.push({name:'mine'});
            },
            handleClick(tab, event){
               
         }
        },
        components:{
            nothing:nothing
    }
    }
</script>