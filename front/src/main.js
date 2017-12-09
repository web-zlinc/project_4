import Vue from 'vue'
import App from './App.vue'
import router from './router/index'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'


//引入公共样式表
import './basescss/base.scss'
import rem from './getRem/getRem'


Vue.use(ElementUI);

rem.rem();

new Vue({
  el: '#app',
  router,
  render: h => h(App)
})
