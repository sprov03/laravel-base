import forms from './Forms';
import axios from 'axios';
import _ from 'lodash';
import uriTemplate from 'uri-templates';

const namespaced = true;

const state = {
    user: {
        forms: []
    },
    errors: []
};

export const getters = {};
export const actions = {
};
export const mutations = {};

export default {
    namespaced,
    state () {
        return state.user;
    },
    getters,
    actions,
    mutations
};
