<template>
    <div>
        <!-- 工具栏 -->
        <ul class="y_toolbar">
          <li class="y_save">
            <el-button type="primary" style="margin-top: 15px;" plain @click="y_userSave">保存</el-button>
          </li>
          <li class="y_back">
            <el-button type="primary" style="margin-top: 15px;" plain @click="y_userBack">返回</el-button>
          </li>
        </ul>
        <!-- 这里要写编辑字段的输入框 -->
        <ul class="y_infor clearfix">
            <li class="name">
                <el-input v-model="name" placeholder="姓名"></el-input>
            </li>
            <li class="nickname">
                <el-input v-model="nickname" placeholder="昵称"></el-input>
            </li>
            <li class="gender">
                <el-select v-model="gender" placeholder="性别">
                    <el-option v-for="item in gen" :key="item.value" :label="item.label" :value="item.value"></el-option>
                </el-select>
            </li>
            <li class="name">
                <el-input v-model="age" placeholder="年龄"></el-input>
            </li>
            <li class="city">
                <el-input v-model="city" placeholder="广东广州"></el-input>
            </li>
            <li class="brithday">
                <el-input v-model="brithday" placeholder="生日“1990-01-01”"></el-input>
            </li>
            <li class="education">
                <el-select v-model="education" placeholder="教育">
                    <el-option v-for="item in edu" :key="item.value" :label="item.label" :value="item.value"></el-option>
                </el-select>
            </li>
            <li class="major">
                <el-select v-model="major" placeholder="专业">
                    <el-option v-for="item in maj" :key="item.value" :label="item.label" :value="item.value"></el-option>
                </el-select>
            </li>
            <li class="phone">
                <el-input v-model="phone" placeholder="手机号"></el-input>
            </li>
            <li class="idcard">
                <el-input v-model="idcard" placeholder="身份证号"></el-input>
            </li>
            <li class="abstract">
                <el-input type="textarea" autosize placeholder="一句话描述" v-model="abstract"></el-input>
            </li>
        </ul>
        <!-- <el-input v-model="city" placeholder="所在地"></el-input> -->
        

    </div>
</template>

<script type="text/javascript">
    import './userEdit.scss';
    import router from '../../router/index.js';
    import axios from 'axios';
    import qs from 'qs'

    export default{
        data:function(){

            return {
                name: this.$store.state.edit.name,
                nickname: this.$store.state.edit.nickname,
                gen: [{
                  value: '男',
                  label: '男'
                },  {
                  value: '女',
                  label: '女'
                }],
                gender:this.$store.state.edit.gender,
                age:this.$store.state.edit.age,
                city:this.$store.state.edit.city,
                brithday:this.$store.state.edit.brithday,
                edu: [{
                  value: '小学',
                  label: '小学'
                },  {
                  value: '初中',
                  label: '初中'
                },  {
                  value: '高中',
                  label: '高中'
                },  {
                  value: '大专',
                  label: '大专'
                },  {
                  value: '本科',
                  label: '本科'
                },  {
                  value: '硕士',
                  label: '硕士'
                },  {
                  value: '博士',
                  label: '博士'
                }],
                education:this.$store.state.edit.education,
                // createtime:'',
                maj: [{
                  value: '物联网',
                  label: '物联网'
                },  {
                  value: '通信工程',
                  label: '通信工程'
                },  {
                  value: '会计',
                  label: '会计'
                },  {
                  value: '电子信息工程',
                  label: '电子信息工程'
                },  {
                  value: '人力资源管理',
                  label: '人力资源管理'
                },  {
                  value: '工商管理',
                  label: '工商管理'
                },  {
                  value: '法学',
                  label: '法学'
                },  {
                  value: '哲学',
                  label: '哲学'
                },  {
                  value: '生物学',
                  label: '生物学'
                }],
                major:this.$store.state.edit.major,
                phone:this.$store.state.edit.phone,
                // password:'',
                idcard:this.$store.state.edit.idcard,
                abstract:this.$store.state.edit.abstract,
                id:this.$store.state.edit.id,

            }
        },
        mounted:function(){
                // 获取存在store中的信息
                return this.$store.state.edit;
        },
        methods:{
            y_userSave:function(){
                // 点击保存要将数据写入数据库中，并出现弹窗显示保存成功
                if(this.name != '' && this.nickname != '' && this.gender != '' && this.age != ''  && this.brithday != '' && this.education != '' && this.major != '' && this.phone != '' && this.idcard != '' && this.abstract != '' ){
                    axios({
                        url:"http://10.3.135.246:333/back/php/userEdit.php",
                        method: 'post',
                        data: qs.stringify({
                            name:this.name,
                            nickname: this.nickname,
                            gender:this.gender,
                            age:this.age,
                            city:this.city,
                            brithday:this.brithday,
                            education:this.education,
                            major:this.major,
                            phone:this.phone,
                            idcard:this.idcard,
                            abstract:this.abstract,
                            id:this.id,
                        }),
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        }
                    }).then(res=>{
                        if(res.data == '修改成功'){
                            alert(res.data)
                            
                        }
                    })
                }else{
                    alert('请将信息填写完整')
                }
                // this.$router.push({name :'userAdd'})
            },
            y_userBack:function(){
                this.$router.push({name :'userInformation'})
            }
        },
        
        
    }
</script>