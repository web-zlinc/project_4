<template>
    <div>
    <el-form label-width="100px" v-for="(obj,index) in dataset" :key="index">
        <el-form-item label="公司：">
            <el-input  placeholder="公司" v-model="obj.company" :value="obj.company"></el-input>
        </el-form-item>
        <el-form-item label="职位：">
            <el-input  placeholder="职位" v-model="obj.station" :value="obj.station"></el-input>
        </el-form-item>
        <el-form-item label="薪酬：">
            <el-input  placeholder="薪酬" v-model="obj.salary" :value="obj.salary"></el-input>
        </el-form-item>
        <el-form-item label="地点：">
            <el-input  placeholder="地点" v-model="obj.site" :value="obj.site"></el-input>
        </el-form-item>
        <el-form-item label="职位要求：">
            <el-input  placeholder="职位要求" v-model="obj.degree" :value="obj.degree"></el-input>
        </el-form-item>
        <el-form-item label="工作时长：">
            <el-input  placeholder="工作时长" v-model="obj.duration" :value="obj.duration"></el-input>
        </el-form-item>      
        <el-form-item label="工作频率：">
            <el-input  placeholder="工作频率" v-model="obj.rate" :value="obj.rate"></el-input>
        </el-form-item>
        <el-form-item label="工作待遇：">
            <el-input  placeholder="工作待遇" v-model="obj.opty" :value="obj.opty"></el-input>
        </el-form-item>
        <el-form-item label="公司规模：">
            <el-input  placeholder="公司规模" v-model="obj.lnsize" :value="obj.lnsize"></el-input>
        </el-form-item>
         <el-form-item label="公司LOGO：">
            <el-input  placeholder="公司LOGO" v-model="obj.logo" :value="obj.logo"></el-input>
        </el-form-item>
        <el-form-item label="公司简介：">
            <el-input type="textarea"  placeholder="公司简介" v-model="obj.cdetails" :value="obj.cdetails"></el-input>
        </el-form-item>
        <el-form-item label="职位描述：">
            <el-input type="textarea"  placeholder="职位描述" v-model="obj.jd" :value="obj.jd"></el-input>
        </el-form-item>
        <el-button type="primary" plain @click="edtSave()">保存</el-button>
        <el-button type="primary" plain @click="edtback()">返回</el-button>
    </el-form>
    </div>

</template>

<script>
    // import vuex  from '../../vuex/store.js'
    import router from '../../router/index.js'
    import axios from 'axios'
    import qs from 'qs';
    export default {
        data(){
            return {
                dataform: {},
                dataset:[],
                select: ''
            }
        },
        mounted: function(){
            return this.dataset.push(this.$store.state.data);

        },
        methods: {
           edtSave: function(){

                axios({
                    url:"http://localhost:2277/php/jobsEdit.php",
                    method: 'post',
                    data: qs.stringify({
                        company: this.dataset[0].company,
                        jid: this.dataset[0].jid,
                        station: this.dataset[0].station,
                        salary: this.dataset[0].salary,
                        site: this.dataset[0].site,
                        degree: this.dataset[0].degree,
                        duration: this.dataset[0].duration,
                        logo: this.dataset[0].logo,
                        rate: this.dataset[0].rate,
                        opty: this.dataset[0].opty,
                        lnsize: this.dataset[0].lnsize,
                        jd: this.dataset[0].jd,
                        cdetails: this.dataset[0].cdetails
                        }),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                    }
                }).then(res=>{
                     console.log(res)
                     if(res.status === 200) {
                        this.$router.push({name: 'jobs'});
                    }
                })
           },
           edtback: function(){
                this.$router.push({name: 'jobs'});
           } 
        } 
    }
</script>