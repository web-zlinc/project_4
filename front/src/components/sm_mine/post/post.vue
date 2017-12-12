<template>
    <div class="rec_content">
        <div id="r_header">
            <p>
                <i class="el-icon-arrow-left" @click="p_return"></i>
                <span v-text="info"></span>
            </p>
        </div>
        <main id="r_main">
            <nothing v-if="nodata"></nothing>
        </main>
    </div>
</template>
<script>
    import '../record/record.scss'
    import nothing from '../no-data/no-data.vue'
    export default{
        data(){
            return {
                nodata: true,
                info: 'ÎÒµÄÌû×Ó',
            }
        },
        methods:{
            p_return:function(){
               this.$router.back(-1);
            }
        },
        components:{
            nothing:nothing
        }
    }

</script>