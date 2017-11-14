/* eslint-disable no-shadow */
import axios from 'axios';
import Vue from 'vue';
import _ from 'lodash';

const state = {
    login: {},
    user: {},
    users: [],
    account: {},
    roles: [],
    allRoles: [],
    actions: [],
    invites: {},
    invite: {},
    channels: [],
    bell: {},
    features: {},
    featurePlan: {},
    planPreview: {},
    invoices: { data: [] },
};

// getters
const getters = {
    users(state) {
        return state.users;
    },
    isSupport(state) {
        return state.account.support
    },
    features: state => type => _.filter(state.features, { feature_type_id: type }),
    feature: state => type => _.find(state.features, { feature_type_id: type }),
    featureCount: state => type => {
        const features = _.filter(state.features, {feature_type_id: type});

        return _.reduce(features, function(total, feature) {
            return total + feature.count
        }, 0)
    }
};

// actions
const actions = {
    loadAccountFromPage({ commit }) {
        if (!window.FlipPilot) {
            Vue.log.info('No Account info on page.');
            return;
        }
        commit('SET_ACCOUNT_STATE', { resource: 'user', value: window.FlipPilot.user });
        commit('SET_ACCOUNT_STATE', { resource: 'account', value: window.FlipPilot.account });
        commit('SET_ACCOUNT_STATE', { resource: 'users', value: window.FlipPilot.users });
        commit('SET_ACCOUNT_STATE', { resource: 'roles', value: window.FlipPilot.roles });
        commit('SET_ACCOUNT_STATE', { resource: 'actions', value: window.FlipPilot.actions });
        commit('SET_ACCOUNT_STATE', { resource: 'channels', value: window.FlipPilot.alert_channels });
        commit('SET_ACCOUNT_STATE', { resource: 'bell', value: window.FlipPilot.bell });
        commit('SET_ACCOUNT_STATE', { resource: 'features', value: window.FlipPilot.features });
    },
    loadAccount({ commit, dispatch }) {
        const resource = 'account';
        const module = 'account';

        dispatch('resetStatus', { config: { module, resource } });

        return axios.get('/api/accounts', {})
            .then((response) => {
                dispatch('setResponse', { config: { module, resource }, response });
                // Remove user from list of all account users
                // delete response.data.users[response.data.user.id];

                commit('SET_ACCOUNT_STATE', { resource: 'user', value: response.data.user });
                commit('SET_ACCOUNT_STATE', { resource: 'account', value: response.data.account });
                commit('SET_ACCOUNT_STATE', { resource: 'users', value: response.data.users });
                commit('SET_ACCOUNT_STATE', { resource: 'roles', value: response.data.roles });
                commit('SET_ACCOUNT_STATE', { resource: 'actions', value: response.data.actions });

                return response;
            }, (response) => {
                dispatch('setError', { config: { module, resource }, response });

                throw response;
            });
    },
    loadAccountRoles({ dispatch }) {
        return dispatch('get', { url: '/api/accounts/roles', config: { module: 'account', resource: 'allRoles' } },
            { root: true });
    },
    loadAccountBilling({ dispatch }) {
        return dispatch('get', { url: '/api/accounts/billing', config: { module: 'account', resource: 'account' } },
            { root: true });
    },
    loadInvites({ dispatch }) {
        return dispatch('get', { url: '/api/accounts/invites', config: { module: 'account', resource: 'invites' } },
            { root: true });
    },
    updateUserRole({ dispatch }, { user, roles }) {
        return dispatch('update', { url: `/api/accounts/users/${user.id}/roles`,
            config: { module: 'account', resource: `user-roles-${user.id}` },
            fieldBag: { roles } }, { root: true });
    },
    saveInvite({ dispatch, commit, invite }) {
        return dispatch('save', { url: '/api/accounts/invites',
            config: {module: 'account', resource: 'invite',},
            fieldBag: state.invite }, { root: true }).then( () => { commit('CLEAR_INVITE_FORM') });
    },
    deleteInvite({ dispatch }, { id }) {
        return dispatch('destroy', { url: `/api/accounts/invites/${id}`,
            config: { module: 'account', resource: `invites-delete-${id}`, noResponse: true },
        }, { root: true });
    },
    resendInvite({ dispatch }, { id }) {
        return dispatch('save', { url: `/api/accounts/invites/${id}`,
                config: { module: 'account', resource: `invites-send-${id}`, noResponse: true }},
            { root: true });
    },
    deactivateUser({ dispatch }, { id }) {
        return dispatch('update', { url: `/api/users/${id}`,
            config: { module: 'account', resource: `user-activate-${id}`, noResponse: true },
            fieldBag: { 'active': false } }, { root: true });
    },
    activateUser({ dispatch }, { id }) {
        return dispatch('update', { url: `/api/users/${id}`,
            config: { module: 'account', resource: `user-activate-${id}`, noResponse: true },
            fieldBag: { 'active': true } }, { root: true });
    },
    pauseUser({ dispatch }, { id }) {
        return dispatch('update', { url: `/api/users/${id}`,
            config: { module: 'account', resource: `user-pause-${id}`, noResponse: true },
            fieldBag: { 'paused' : true } }, { root: true });
    },
    unpauseUser({ dispatch }, { id }) {
        return dispatch('update', { url: `/api/users/${id}`,
            config: {module: 'account', resource: `user-pause-${id}`, noResponse: true },
            fieldBag: {'paused' : false}}, { root: true });
    },
    updateUser({ dispatch }, { id, fieldBag }) {
        return dispatch('update', { url: `/api/users/${id}`,
                config: {module: 'account', resource: 'user'},
                fieldBag },
            { root: true });
    },
    loadFeaturePlan({ dispatch }, { id }) {
        return dispatch('get', { url: `/api/features/${id}/plan`, config: { module: 'account', resource: 'featurePlan' } },
            { root: true });
    },
    buyAddOn({ dispatch }, { id }) {
        return dispatch('save', { url: `/api/features/${id}/buy`, config: { module: 'account', resource: 'features' } },
            { root: true });
    },
    updateBillingInformation({ dispatch }, token) {
        return dispatch(
            'update',
            {
                url: `/api/accounts/billing/token`,
                config: { module: 'account', resource: 'account' },
                fieldBag: { token }
            },
            { root: true }
        );
    },
    loadInvoices({ dispatch }) {
        return dispatch('get', { url: `/api/accounts/invoices`, config: { module: 'account', resource: 'invoices' } },
            { root: true });
    },
    changeBillingPlanPreview({ dispatch }, { id }) {
        return dispatch(
            'get',
            {
                url: `/api/features/plans/${id}/preview`,
                config: { module: 'account', resource: 'planPreview' },
                fieldBag: { plan_id: id }
            },
            { root: true }
        );
    },
    changeBillingPlan({ dispatch }, { id }) {
        return dispatch(
            'update',
            {
                url: `/api/accounts/plans`,
                config: { module: 'account', resource: 'account' },
                fieldBag: { plan_id: id }
            },
            { root: true }
        );
    },
    ajaxLogin({ dispatch, state } ) {
        return dispatch(
            'save',
            {
                url: '/accounts/login',
                config: { module: 'account', resource: 'login' },
                fieldBag: { password: state.login.password, email: state.user.email, remember: true },
            },
            { root: true }
        ).then((response) => {
            axios.defaults.headers.common['X-CSRF-TOKEN'] = response.data.csrf;
            Laravel.csrfToken = response.data.csrf;
            // update logout form...
            document.getElementById('logout-form').querySelector('input[name="_token"]').value = response.data.csrf;
        });
    },
};

// mutations
const mutations = {
    SET_ACCOUNT_STATE(state, { resource, value }) {
        state[resource] = value;
    },
    SET_DEFAULT_CHANNELS(state, { channels }){
        state['channels'] = channels;
    },
    UPDATE_USER_SETTING(state, { id, field, value }) {
        const user = _.find(state.users, { id });

        if (!user) {
            Vue.log.error('User setter failed to find user id:', id, field, value);
        }

        user[field] = value;
    },
    ADD_ALERT_TO_BELL(state, alert_type) {
        if (state.bell[alert_type] === undefined) {
            Vue.set(state.bell, alert_type, 1);

            return;
        }

        state.bell[alert_type] += 1;
    },
    CLEAR_INVITE_FORM(state) {
        state.invite = {};
    },
};

export default {
    state,
    getters,
    actions,
    mutations,
};