/* eslint-disable no-shadow */
import Vue from 'vue';
import Vuex from 'vuex';
import _ from 'lodash';
Vue.use(Vuex);

import * as actions from './actions';
import * as mutations from './mutations';
import userIndex from './users';
import account from './modules/account';
import config from './config';


export const state = {
    status: {},
    page: { loading: true, loaded: false, errors: [], message: '' },
    breadcrumbs: { links: null, settings: null },
    alerts: [],
    modal: {},
    url: { search: {}, hash: {}},
    config,
};

/**
 * Global getters
 */
export const getters = {
    lookup: state => path => path.split('.').reduce((obj, index) => {
        if (!obj[index]) {
            console.log.debug(`can't find:${index} in:`, obj);
            return {};
        }

        return obj[index];
    }, state),
    user: state => (id) => {
        if (!id) {
            return state.account.user;
        }

        const user = _.find(state.account.users, { id });

        if (!user) {
            return {};
        }

        return user;
    },

    /**
     * These are simple helper to push a specific convention
     * @param state
     */
    resource: state => (module, resource) => state[module][resource],
    resourceTest: state => options => state[options.module][options.resource],
    settings: state => (resource, field) => {
        if (state.settings[resource] === undefined) {
            return {};
        }

        return state.settings[resource][field] || {};
    },
    status: state => (resource) => {
        const status = state.status[resource];

        if (status === undefined) {
            console.log.debug(`Error: Status for ${resource} was checked before it was created.`);
        }

        return status;
    },
    anchor: state => Object.keys(state.url.hash)[0],
};

export default new Vuex.Store({
    state,
    actions,
    mutations,
    getters,
    modules: {
        account,
    },
});