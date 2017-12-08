<template>
    <div class="container">
        <ul id="r_header">
            <li><span class="active">全部</span></li>
            <li><span >面试记录</span></li>
            <li><span>不合适</span></li>
        </ul>
        <main id="r_main">
            <nothing v-if="nodata"></nothing>
        </main>
    </div>
</template>
<script>
    import nothing from './no-data.vue'
    import './record.scss'
    export default{
        data:function(){
        return {
            nodata:true
        }
        },
        components:{
            nothing:nothing
    }
    }

</script>