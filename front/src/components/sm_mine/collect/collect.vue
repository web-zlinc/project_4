<template>
    <div class="rec_content">
        <div id="r_header">       
            <p><i class="el-icon-arrow-left" @click="c_return"></i>我的收藏</p>
        </div>
        <el-tabs id="r_nav" v-model="activeName" @tab-click="handleClick">
        <el-tab-pane label="收藏职位" name="first"></el-tab-pane>
        <el-tab-pane label="收藏公司" name="second"></el-tab-pane>
        <div id="r_main">
            <nothing></nothing>
        </div>
        </el-tabs>
        
    </div>
</template>

<script>
    import '../record/record.scss'
    import nothing from '../no-data/no-data.vue'
    
    export default{
        data:function(){
            return {
                activeName: 'first'
            }
        },
        methods:{
            c_return:function(){
                this.$router.back(-1);
            },
             handleClick(tab, event){
                console.log(tab, event);
      }
        },
        components:{
            nothing:nothing
        }
    }
</script>