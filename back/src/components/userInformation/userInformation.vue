<template>
    <div>
        <!-- <datagrid api="http://10.3.135.246:333/back/php/userInformation.php" :filter="filter"></datagrid> -->
        什么鬼
    </div>
</template>

<script type="text/javascript">
    import datagrid from '../datagrid/datagrid.vue';
    import router from '../../router/index.js'

    export default{
        data:function(){
            return {
                filter:[],
                tools: {
                    add: {
                        text: '添加客户',
                        event: function(){
                            router.push({name: 'addInformation'})
                        }
                    }
                }
            }
        },
        components:{
            datagrid:datagrid
        }
        
    }
</script>