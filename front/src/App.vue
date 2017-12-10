<template>
  <div id="app">
    <router-view :username="username"></router-view>
  </div>
</template>

<script>
    import './App.scss'
    export default {
      name: 'app',
      data () {
        return {
          username:'1888888888'
        }
      }
    }
</script>
