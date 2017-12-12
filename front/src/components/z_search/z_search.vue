<template>
    <div id="container">
        <div id="zs_head">
            <input type="text" id="text" placeholder="热门搜索" v-model='val' />
            <input type="button" id="search" value="搜索" @click="jtype"/> 
        </div>
        <div id="zs_nav">
            <ul>
                <li class="sa" v-for="(value,index) in sort" @click="fun3(index)" >
                    <a href="#">{{value}}</a>
                    <i class="si el-icon-caret-bottom"></i>
                    <ul class="ul1">
                        <li v-for="(val,idx) in obj[0][index]" :key="val" @click="fun1(val,index)">{{val}}</li>
                    </ul>
                </li>
                <li>
                    <a href="#">......</a>
                </li>
            </ul>
        </div>
        <zmain v-if='show' :key="val" ></zmain>
        <div id="zs_main" v-show='!show'>
            <h1>热门搜索</h1>
            <ul>
                <li v-for="(value,index) in obj[0][0]" @click='fun2(value)'>
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
                sort:['类型','地点','日薪','学历'],
                obj:[
                    [],
                    [],
                    [],
                    []
                ],
                val:'',
                site:'',
                salary:'',
                degree:'',
                show:false,
                show1:false
            }
        },
        methods:{
            jtype(){
                var item =$('#text').val();
                this.show=true;
                this.val=item;
            },
            fun1(a,idx){
                this.show=true;
                this.val=a;
                idx == 1 ? this.site = a:idx == 2 ? this.salary = a:idx == 3 ? this.degree = a:this.val = a;
            },
            fun2(content){
                this.val=content;
            },
            fun3(idx){
                var $currli=$('.sa').eq(idx);
                var $currul=$currli.find('ul');
                $currli.find('a').css('color','skyblue');
                var height=$currli.find('ul').height();
                $currli.siblings('.sa').find('a').css('color','#000');
                $currli.siblings('.sa').find('ul').css({
                    display:'none'
                })
                $currul.slideToggle('slow', function() {
                   
                });
                
            }
        },
        components:{
            //子组件
            zmain:list
        },
        mounted(){
            axios({
                url:'http://localhost:3333/api/zindex.php',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            }).then(res => {
                var arr=[];
                var site=[];
                var salary=[];
                var degree=[];

                $.each(res.data,(idx,obj)=>{
                    arr.push(obj.jtype);
                    site.push(obj.site);
                    salary.push(obj.salary);
                    degree.push(obj.degree);
                })
                //es6数组去重
                var newArr=Array.from(new Set(arr));
                var newArr1=Array.from(new Set(site));
                var newArr2=Array.from(new Set(salary));
                var newArr3=Array.from(new Set(degree));

                //问题解决
                this.$set(this.obj[0],0,newArr)
                this.$set(this.obj[0],1,newArr1)
                this.$set(this.obj[0],2,newArr2)
                this.$set(this.obj[0],3,newArr3)

                //遇到问题(不能渲染到页面)
                // this.obj[0][0]=newArr;
                // this.obj[0][1]=newArr1;
                // this.obj[0][2]=newArr2;
                // this.obj[0][3]=newArr3;

                
            })
        }
       
    }
</script>