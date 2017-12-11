import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
     // 定义状态
     state: {
        pro: [],
        edit:''
     },
    mutations:{
        searchInfor(state,msg){
            state.pro = msg
        },
        editInfor(state,msg1){
            state.edit = msg1
        },
    }
})
export default store
