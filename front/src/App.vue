<template>
        <router-view v-bind:username="username"></router-view>   
</template>

<script>
import $ from 'jquery'
export default {
// ||'请登录/注册账号'
  name: 'app',
  data () {
    return {
     username:'1888888888'
    }
  }
}
$(function(){
    
})
</script>
