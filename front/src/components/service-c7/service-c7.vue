<template>
    <div id="service">
        <header class="sev-header">
            <i class="el-icon-arrow-left sev-back" @click="back"></i>
            <h3>客服</h3>
        </header>
        <ul class="sev-main">
            <li>
                <div class="sev-imgbox">
                     <img src="../../assets/imgs/portrait.jpg"/>     
                </div>
                <p>寻找知音
                人的一生当中总有一些选择你必须要去面对。如果你想在某些领域有所成就，那么你就不得不有所取舍。只要学会做选择，每个人都可以是人生赢家。  
                </p>
            </li>
            <li class="active">
                <div class="sev-imgbox">
                     <img src="../../assets/imgs/portrait.jpg"/>     
                </div>
                <p>寻找知音
                人的一生当中总有一些选择你必须要去面对
                </p>
            </li>
            <li>
                <div class="sev-imgbox">
                     <img src="../../assets/imgs/portrait.jpg"/>     
                </div>
                <p>寻找知音
                人的一生当中总有一些选择你必须要去面对。如果你想在某些领域有所成就，那么你就不得不有所取舍。只要学会做选择，每个人都可以是人生赢家。  
                </p>
            </li>
            <li class="active">
                <div class="sev-imgbox">
                     <img src="../../assets/imgs/portrait.jpg"/>     
                </div>
                <p>寻找知音
                人的一生当中总有一些选择你必须要去面对
                </p>
            </li>
            <li>
                <div class="sev-imgbox">
                     <img src="../../assets/imgs/portrait.jpg"/>     
                </div>
                <p>寻找知音
                人的一生当中总有一些选择你必须要去面对。如果你想在某些领域有所成就，那么你就不得不有所取舍。只要学会做选择，每个人都可以是人生赢家。  
                </p>
            </li>
            <li class="active">
                <div class="sev-imgbox">
                     <img src="../../assets/imgs/portrait.jpg"/>     
                </div>
                <p>寻找知音
                人的一生当中总有一些选择你必须要去面对
                </p>
            </li>
            <li>
                <div class="sev-imgbox">
                     <img src="../../assets/imgs/portrait.jpg"/>     
                </div>
                <p>寻找知音
                人的一生当中总有一些选择你必须要去面对。如果你想在某些领域有所成就，那么你就不得不有所取舍。只要学会做选择，每个人都可以是人生赢家。  
                </p>
            </li>
            <li class="active">
                <div class="sev-imgbox">
                     <img src="../../assets/imgs/portrait.jpg"/>     
                </div>
                <p>寻找知音
                人的一生当中总有一些选择你必须要去面对
                </p>
            </li>
        </ul>
        <el-input placeholder="请输入内容..."></el-input>
        <dl class="sev-footer">
            <dt class="el-icon-phone"></dt>
            <dt class="el-icon-sort"></dt>
            <dt class="el-icon-picture"></dt>
            <dt class="el-icon-star-on"></dt>
        </dl>
    </div>
</template>

<script>
    import './service-c7.scss'
    export default {
        data(){
            return {}
        },
        methods:{
            back(){
                this.$router.push({name:'message'})
            }
        }
    }
</script>