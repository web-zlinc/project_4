import Vue from 'vue'
import App from './App.vue'

import Element from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
Vue.use(Element)

import Router from './router/index.js'
new Vue({
  el: '#app',
  router:Router,
  render: h => h(App)
})
