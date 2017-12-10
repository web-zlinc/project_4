import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
     // 定义状态
     state: {
        pro: []
     },
    mutations:{
        searchInfor(state,msg){
            state.pro = msg
        }
    }
})
export default store
