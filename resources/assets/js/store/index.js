/* eslint-disable no-shadow */
import Vue from 'vue';
import Vuex from 'vuex';
import _ from 'lodash';
Vue.use(Vuex);

// import * as actions from './actions';
import * as mutations from './mutations';
import users from './modules/Users';
import user from './modules/Users';

export const state = {
    status: {},
    page: { loading: true, loaded: false, errors: [], message: '' },
    config: require('./config'),
    user: {},
    users: [],
    site: {},
    sites: {},
    form: [],
    forms: [],

    /** Don't Chane Me Regex Target For Templating Vue Store */
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