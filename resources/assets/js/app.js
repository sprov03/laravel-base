/**
 * Created by shawnpivonka on 11/13/17.
 */

import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import store from './store';

const app = new Vue({
    store,
    el: 'body',
    components: {
        usersIndex: require('app/users/index.vue'),
    },
    mixins: [],
    created() {
        console.log.debug('app created');
    },
});