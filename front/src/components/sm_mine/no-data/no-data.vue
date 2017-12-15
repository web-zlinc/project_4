<template>
<div class="no_data">
    <img class="imghanmei" src="../../../assets/imgs/no-data.png" alt="" />
    <h5 class="hanmei">暂无记录</h5>
</div>
    
</template>
    <!-- 无数据时显示该组件 -->
<style>
    .no_data{
        background-color:#F5F5F5;
        flex:1;
        width: 100%；
    }
    .imghanmei{
         margin:200px auto 100px;
            width: 408px;
            height:243px;
    }
    .hanmei{
         font-size:45px;
            font-weight:bold;
            text-align:center;
    }

</style>