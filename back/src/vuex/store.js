import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
     // 定义状态
     state: {
        pro: [],
        edit:'',
        data: ''

     },
    mutations:{
        searchInfor(state,msg){
            state.pro = msg
        },
        editInfor(state,msg1){
            state.edit = msg1
        },
        jobsEditInfor(state, dataId) {
            state.data = dataId
        }
    }
})
export default store
