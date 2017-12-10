import Vue from 'vue'
import Vuex from 'vuex'

import login from '../components/login-c7/logic-c7'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        login,
    }
})
