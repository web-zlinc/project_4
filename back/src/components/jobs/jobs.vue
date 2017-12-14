<template>
    <div>

        <ul class="h_toolbar">
          <li class="h_search">
            <div style="margin-top: 15px;">
            <el-input placeholder="请输入内容" v-model="h_search_val" class="input-with-select">
              <el-select v-model="select" slot="prepend" placeholder="请选择">
                <el-option label="公司名字" value="company"></el-option>
                <el-option label="职位" value="station"></el-option>
              </el-select>

              <!-- 将输入框中的值传给userSearch -->
                <el-button slot="append" icon="el-icon-search" @click="h_jobsSearch">
                    
                </el-button>

            </el-input>
          </div>
          </li>
          <li class="h_add">
            <el-button type="primary" style="margin-top: 15px;" plain @click="add()">添加</el-button>
          </li>
        </ul>
        <div>
            <datagrid api="http://10.3.135.251:2277/php/job.php" :filter="filter" :change="change"></datagrid>
        </div>
    </div>
</template>

<script>
    import spinner from '../spinner/spinner.vue'
    import datagrid from '../datagrid/datagrid.vue'
    import router from '../../router/index.js'
    import http from 'axios'


    export default {

           data(){
            return {
                filter: [],
                dataform: {},
                h_search_val: '',
                select: '',
                show: false,
                change:{
                    jid:"id",
                    company:"公司",
                    station:"职位",
                    salary:"薪酬",
                    site:"地点",
                    degree:"职位要求",
                    duration:"工作时长",
                    rate:"工作频率",
                    opty:"工作待遇",
                    lnsize:"公司规模",
                    logo:"公司LOGO",
                    cdetails:"公司简介",
                    jd:"职位描述",
                    jtype:"岗位信息",
                    recommend:"热门",
                    time:"时间",
                }

            }
        },
        components: {
            datagrid,
            spinner: spinner

        },
        methods: {
            // this.$parent.initToolbar(this.toolbar);
            add: function(){
                // console.log(666)
                this.$router.push({name: 'job'});
            },
            h_jobsSearch: function(){
                this.$store.commit('searchInfor',[this.h_search_val,this.select]),
                this.show = true,
                this.$router.push({name: 'jobsSearch'})
            }

        }
    }
</script>