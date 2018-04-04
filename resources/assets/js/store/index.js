/* eslint-disable no-shadow */
import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

// import * as actions from './actions';
import * as mutations from './mutations';
import users from './modules/Users';
import user from './modules/Users';
import forms from './modules/Forms';
import form from './modules/Forms';

export const state = {
    status: {
    },
    page: { loading: true, loaded: false, errors: [], message: '' },
    config: require('./config'),

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
    modules: {
        user,
        users,
        form,
        forms,
    }
});