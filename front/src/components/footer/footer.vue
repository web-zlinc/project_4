<template>
    <div class="z_footer">
        <ul>
            <li @click="chance"><i class="el-icon-info"></i><a>机会</a></li>
            <li @click="mess"><i class="el-icon-bell"></i><a>消息</a></li>
            <li @click="fum"><i class="el-icon-mobile-phone"></i><a>论坛</a></li>
            <li @click="me"><i class="el-icon-star-on"></i><a>我的</a></li>
        </ul>
    </div>
</template>

<script type="text/javascript">
    import './footer.scss';
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
</script>