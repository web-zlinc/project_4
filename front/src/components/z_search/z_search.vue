<template>
    <div id="container">
        <div id="zs_head">
            <input type="text" id="text" placeholder="热门搜索" v-model='val' />
            <input type="button" id="search" value="搜索" @click="jtype"/> 
        </div>
        <div id="zs_nav">
            <ul>
                <li class="sa">
                    <a href="#">类型</a>
                    <i class="si el-icon-caret-bottom"></i>
                </li>
                <li class="sa">
                    <a href="#">地点</a>
                    <i class="si el-icon-caret-bottom"></i>
                </li>
                <li class="sa">
                    <a href="#">日薪</a>
                    <i class="si el-icon-caret-bottom"></i>
                </li>
                <li class="sa">
                    <a href="#">学历</a>
                    <i class="si el-icon-caret-bottom"></i>
                </li>
                <li>
                    <a href="#">......</a>
                </li>
            </ul>
        </div>
        <zmain v-if='show' ></zmain>
        <div id="zs_main" v-show='!show'>
            <h1>热门搜索</h1>
            <ul>
                <li v-for="(value,index) in sdata" @click='find(value)'>
                    <span>{{value}}</span>
                </li>
                
            </ul>
        </div>
    </div>
</template>

<script type="text/javascript">
    import './z_search.scss';
    import list from '../z_list/z_list.vue'
    import $ from 'jquery';
    import axios from 'axios';
    import qs from 'qs';

    export default{
        data(){
            return {
                sdata:[],
                val:'',
                show:false,
                
            }
        },
        methods:{
            jtype:function(){
                var item =$('#text').val();
                this.show=true;
                this.val=item;
            },
            find(content){
                this.val=content;
            }
        },
        components:{
            zmain:list
        },
        mounted(){
            axios({
                url:'http://localhost:3333/php/zindex.php',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(res => {
                var arr=[];
                $.each(res.data,(idx,obj)=>{
                    arr.push(obj.jtype);
                })
                //es6数组去重
                var newArr=Array.from(new Set(arr));
                this.sdata=newArr;
            })
        }
       
    }
</script>