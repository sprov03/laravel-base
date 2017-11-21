/**
 * Created by shawnpivonka on 11/13/17.
 */

import Vue from 'vue';
import Vuex from 'vuex';
import Http from './http.js';

Vue.use(Vuex);
Vue.use(Http);

import store from './store';

const app = new Vue({
    store,
    el: '#app',
    components: {
        /** Page Components **/
        usersIndex: require('./components/users/index.vue'),
        usersCreate: require('./components/users/create.vue'),
        usersEdit: require('./components/users/edit.vue'),
    },
    mixins: [],
    created() {
        console.log('app created');
    },
});