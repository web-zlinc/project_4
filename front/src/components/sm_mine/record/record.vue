<template>
    <div class="rec_content">
    <div id="r_header"><p><i class="el-icon-arrow-left" @click="r_return"></i>兼职记录</p></div>
     <el-tabs id="r_nav" v-model="activeName" @tab-click="handleClick">
        <el-tab-pane label="全部" name="first">
             <ul v-if="dataset!=''">
                <li :gid="obj.jid" v-for="(obj, index) in dataset" >
                    <img :src="'../../'+obj.logo" />
                    <div class="zmr">
                        <p class="one">
                            <span class='fl'>{{obj.station}}</span>
                            <span class="fr" @click.stop="remove">X</span>
                        </p>
                        <p class="two">{{obj.company}}</p>
                        <p class="three">
                            <span class="t1 el-icon-location-outline">{{obj.site.slice(0,4)}}</span> 
                            <span class="t2 el-icon-time">{{obj.rate}}</span>
                            <span class="t3">{{obj.salary}}</span>
                        </p>
                    </div>
                </li>
            </ul>     
            <nothing v-else></nothing>
        </el-tab-pane>
        <el-tab-pane label="面试记录" name="second">
            <nothing v-if="dataset==''"></nothing>
        </el-tab-pane>
         <el-tab-pane label="不合适" name="third">
             <nothing v-if="dataset==''"></nothing>
         </el-tab-pane>
        </el-tabs>
    </div>
</template>
<script>
    import './record.scss'
    import nothing from '../no-data/no-data.vue'
    export default{
        data:function(){
            return {
                activeName: 'first',
                dataset:[]
            }
        },
        mounted(){
             axios({
                url:'http://localhost:1232/collect.php',
                method: 'post',
                data: qs.stringify({phone:window.localStorage.getItem('obj')}),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(res => {
                if(res.data==''){
                    this.data=true;
                }
                this.dataset = res.data;
              
            })
        },
        methods:{
            r_return:function(){
                this.$router.back(-1);
            },
            handleClick(tab, event){
               this.$router.push({
                    name: 'details',
                    query:idx
                });
         }
        },
        components:{
            nothing:nothing
    }
    }
</script>