<template>

    <el-form label-width="100px">
        <el-form-item label="公司：">
            <el-input v-model="dataform.company" placeholder="公司"></el-input>
        </el-form-item>
        <el-form-item label="职位：">
            <el-input v-model="dataform.station" placeholder="职位"></el-input>
        </el-form-item>
        <el-form-item label="薪酬：">
            <el-input v-model="dataform.salary" placeholder="薪酬"></el-input>
        </el-form-item>
        <el-form-item label="地点：">
            <el-input v-model="dataform.site" placeholder="地点"></el-input>
        </el-form-item>
        <el-form-item label="职位要求：">
            <el-input v-model="dataform.degree" placeholder="职位要求"></el-input>
        </el-form-item>
        <el-form-item label="工作时长：">
            <el-input v-model="dataform.duration" placeholder="工作时长"></el-input>
        </el-form-item>        
        <el-form-item label="工作频率：">
            <el-input v-model="dataform.rate" placeholder="工作频率"></el-input>
        </el-form-item>
        <el-form-item label="工作待遇：">
            <el-input v-model="dataform.opty" placeholder="工作待遇"></el-input>
        </el-form-item>
        <el-form-item label="公司规模：">
            <el-input v-model="dataform.lnsize" placeholder="公司规模"></el-input>
        </el-form-item>
        <el-form-item label="公司简介：">
            <el-input type="textarea" v-model="dataform.cdetails" placeholder="公司简介"></el-input>
        </el-form-item>
        <el-form-item label="职位描述：">
            <el-input type="textarea" v-model="dataform.jd" placeholder="职位描述"></el-input>
        </el-form-item>
        <el-button type="primary" plain @click="save()">保存</el-button>
        <el-button type="primary" plain @click="back()">返回</el-button>
    </el-form>

</template>

<script type="text/javascript">
    import router from '../../router/index.js'
    import http from 'axios'
    export default {
        data(){
            return {
                dataform: {},
            }
        },
        methods: {
            save: function(){
                // console.log(this.dataform)
                http.get('http://10.3.135.251:2277/php/jobInser.php',{
                    params:{
                        company: this.dataform.company,
                        station: this.dataform.station,
                        salary: this.dataform.salary,
                        site: this.dataform.site,
                        degree: this.dataform.degree,
                        duration: this.dataform.duration,
                        rate: this.dataform.rate,
                        opty: this.dataform.opty,
                        lnsize: this.dataform.lnsize,
                        jd: this.dataform.jd,
                        cdetails: this.dataform.cdetails,
                        jtype: this.dataform.station,
                    }
                })
                .then(response => {
                    console.log(response)
                    if(response.status === 200) {
                        this.$router.push({name: 'jobs'});
                    }
                })
            },
            back: function(){
                this.$router.push({name: 'jobs'});
            }
        }
    }
</script>