/* eslint-disable no-shadow */
import Vue from 'vue';
import Vuex from 'vuex';
import _ from 'lodash';
Vue.use(Vuex);

// import * as actions from './actions';
import * as mutations from './mutations';

export const state = {
    status: {},
    page: { loading: true, loaded: false, errors: [], message: '' },
    users: [],
    config: require('./config'),
    modules: {
        user: require('./moduels/users'),
        users: require('./moduels/users')
    },
};

/**
 * Global actions
 */
export const actions = {
};

/**
 * Global getters
 */
export const getters = {
};

export default new Vuex.Store({
    state,
    actions,
    mutations,
    getters,
});