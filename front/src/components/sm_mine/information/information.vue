<template>
    <div class="i_container" :username='username'>
        <ul id="mine_header">
            <li><i class="el-icon-arrow-left" @click="i_return"></i></li>
            <li>个人资料</li>
            <li><span @click="i_save">保存</span></li>
        </ul>
        <ul id="i_main">
        <li><label>照片</label>
        
        <el-upload
          class="avatar-uploader"
          action="https://jsonplaceholder.typicode.com/posts/"
          :show-file-list="false"
          :on-success="handleAvatarSuccess"
          :before-upload="beforeAvatarUpload">
          <img v-if="imageUrl" :src="imageUrl" class="avatar">
        </el-upload><input type="text" v-show="1!=1"/>
           <i class="el-icon-arrow-right"></i></li>
            <li><label>姓名</label><input type="text" placeholder="请填写" clearable/><i></i></li>
             <li><label>昵称</label><input type="text" placeholder="请填写"/><i></i></li>
              <li><label>一句话介绍</label><input type="text" placeholder="请填写"/><i></i></li>
            <li><label>性别</label><input type="text" placeholder="请选择" /><i class="el-icon-arrow-right"></i></li>
            <li><label>年龄</label><input type="text" placeholder="请选择" /><i class="el-icon-arrow-right"></i></li>
            <li><label>现居城市</label><input type="text" placeholder="请填写"/><i></i></li>
            <li><label>生日</label>
            <el-date-picker
              v-model="value1"
              type="date"
              placeholder="请选择">
            </el-date-picker>
       
            <i class="el-icon-arrow-right"></i></li>
            <li><label>学历</label><input type="text" placeholder="请选择"/><i class="el-icon-arrow-right"></i></li>
            <li><label>毕业时间</label>
            <el-date-picker
              v-model="value2"
              type="date"
              placeholder="请选择">
            </el-date-picker>
            <i class="el-icon-arrow-right"></i></li>
            <li><label>专业</label><input type="text" placeholder="请填写" clearable/><i></i></li>
            <li><label>手机号码</label><input type="text" placeholder="请填写" clearable/><i></i></li>
            <li><label>邮箱地址</label><input type="text" placeholder="请填写" clearable /><i></i></li>

        </ul>
    </div>
</template>
<script type="text/javascript">
import '../information/information.scss'
import $ from 'jquery'
import axios from 'axios'
import qs from 'qs'
    export default{
        data:function(){
          return {
            imageUrl: '',
            value1: '',
            value2:'' 
          }
        },
        computed:{
          username:{
            get:function(){         
              axios({
                    url: 'http://localhost:666/api/info.php',
                    method:'post',
                    data: qs.stringify({username:this.$attrs.username}),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(res=>{
                  console.log(res)
                    var len=$('#i_main').find('li').length;
                    var i=1;
                    $.each(res.data[0],function(index,item){        
                        $('#i_main').find('input').eq(i).val(item);
                        i++;
                    })
                })
            }
          }
        },
        methods:{
            i_return:function(){
              // 返回上一页
                this.$router.back(-1);
            },
            i_save:function(){  
                this.$message('你的资料已保存成功！');            
                this.$router.push({name:'mine'})                          
            },
            handleAvatarSuccess(res, file) {
            this.imageUrl = URL.createObjectURL(file.raw);
            }, 
              beforeAvatarUpload(file) {
            const isJPG = file.type === 'image/jpeg';
            const isLt2M = file.size / 1024 / 1024 < 2;

            if (!isJPG) {
              this.$message.error('上传头像图片只能是 JPG格式!');
            }
            if (!isLt2M) {
              this.$message.error('上传头像图片大小不能超过 2MB!');
            }
            return isJPG && isLt2M;
          }
        }
    }
    
</script>