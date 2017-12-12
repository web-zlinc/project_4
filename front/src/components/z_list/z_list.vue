<template>
    <div id="container">
        <div id="zl_main">
            <ul v-if="datalist.length > 0">
                <li v-for="(obj, index) in datalist" @click="detail(obj.jid)">
                    <img :src="obj.logo" />
                    <div class="zlmr">
                        <p class="one">
                            <span class='ol'>{{obj.station}}</span>
                            <span class="or">{{obj.time.slice(5,16)}}更新</span>
                        </p>
                        <p class="two">{{obj.company}}</p>
                        <p class="three">
                            <span class="tl el-icon-location-outline">{{obj.site.slice(0,10)}}</span>
                            <span class="tr">{{obj.salary}}</span>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script type="text/javascript">
    import './z_list.scss';
    import axios from 'axios';
    import qs from 'qs';

    export default{
        data:function(){
            return {
                datalist:[]
            }
        },
        methods:{
            detail(idx){
                this.$router.push({
                    name: 'details',
                    query:idx
                });
            }
        },
        computed:{
            change:{
                get(){
                    var jtype=this.$parent.val;
                    var site=this.$parent.site;
                    var salary=this.$parent.salary;
                    var degree=this.$parent.degree;
                    if(site){
                        axios({
                            url:'http://localhost:3333/api/zindex.php',
                            method: 'post',
                            data: qs.stringify({site:site}),
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }
                        }).then(res => {
                            this.datalist = res.data;
                        })
                    }
                    else if(salary){
                        axios({
                            url:'http://localhost:3333/api/zindex.php',
                            method: 'post',
                            data: qs.stringify({salary:salary}),
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }
                        }).then(res => {
                            this.datalist = res.data;
                        })
                    }else if(degree){
                        axios({
                            url:'http://localhost:3333/api/zindex.php',
                            method: 'post',
                            data: qs.stringify({degree:degree}),
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }
                        }).then(res => {
                            this.datalist = res.data;
                        })
                    }else{
                        axios({
                            url:'http://localhost:3333/api/zindex.php',
                            method: 'post',
                            data: qs.stringify({jtype:jtype}),
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            }
                        }).then(res => {
                            this.datalist = res.data;
                        })
                    }
                    
                }
            }
        },
        mounted(){
            this.change;
        }

        
    }
</script>