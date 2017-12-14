<template>
    <div class="z_footer">
        <ul>
            <li @click="chance"><i class="el-icon-info"></i><span>机会</span></li>
            <li @click="mess"><i class="el-icon-bell"></i><span>消息</span></li>
            <li @click="fum"><i class="el-icon-mobile-phone"></i><span>论坛</span></li>
            <li @click="me"><i class="el-icon-star-on"></i><span>我的</span></li>
        </ul>
    </div>
</template>

<script type="text/javascript">
    import './footer.scss';
    import $ from 'jquery';
    export default{
        data(){
            return {}
        },
        methods :{
            chance(){
                this.$router.push({name:'index'});
            },
            mess(){
                this.$router.push({name:'message'});
            },
            fum(){
                this.$router.push({name:'forum'});
            },
            me(){
                this.$router.push({name:'mine'});
            }
        }
    }
    $(function(){
        $('.z_footer').on('click','li',function(){
            $(this).addClass('active');
         }) 
    })
   
</script>