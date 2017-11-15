// const Vue = require('vue');
// const axios = require('axios');
//
// export const save = ({ state, dispatch }, { url, config, fieldBag }) => {
//     dispatch('resetStatus', { config });
//     return axios.post(url, fieldBag)
//         .then((response) => {
//             dispatch('setResponse', { config, response });
//
//             return response;
//         }, ({ response }) => {
//             dispatch('setError', { config, response });
//
//             throw response;
//         });
// };
//
// export const update = ({ dispatch }, { url, config, fieldBag }) => {
//     dispatch('resetStatus', { config });
//     return axios.put(url, fieldBag)
//         .then((response) => {
//             dispatch('setResponse', { config, response });
//
//             return response;
//         }, ({ response }) => {
//             dispatch('setError', { config, response });
//
//             throw response;
//         });
// };
//
// export const get = ({ dispatch }, { url, config, query }) => {
//     dispatch('resetStatus', { config });
//     return axios.get(url, { params: query })
//         .then((response) => {
//             dispatch('setResponse', { config, response });
//
//             return response;
//         }, ({ response }) => {
//             dispatch('setError', { config, response });
//
//             throw response;
//         });
// };
//
// export const destroy = ({ dispatch }, { url, config, query }) => {
//     dispatch('resetStatus', { config });
//     return axios.delete(url, { params: query })
//         .then((response) => {
//             dispatch('setResponse', { config, response });
//
//             return response;
//         }, ({ response }) => {
//             dispatch('setError', { config, response });
//
//             throw response;
//         });
// };
//
// /**
//  * Reset the status while talking to the server
//  *
//  * Config requires: resource name (to map to status)
//  *
//  *
//  * @param commit
//  * @param getters
//  * @param config
//  */
// export const resetStatus = ({ commit, getters }, { config }) => {
//     Vue.log.debug(`resetting status ${config.resource}`);
//
//     if (getters.status(config.resource) === undefined) {
//         Vue.log.debug(`adding status for ${config.resource}`);
//
//         commit('ADD_STATUS', config.resource);
//     }
//
//     commit('SET_STATUS', { resource: config.status || config.resource, loading: true, loaded: false, errors: [] });
// };
//
// /**
//  * Set the result of a successful talk with the server
//  *
//  * Config requires:
//  * a. resource name (to map to status)
//  * b. Optionally a custom setter {name, options} to set the results into the store
//  * c. Optionally don't do again with the response.
//  *
//  * @param commit
//  * @param config
//  * @param response
//  */
// export const setResponse = ({ commit }, { config, response }) => {
//     commit('SET_STATUS', { resource: config.status || config.resource, loading: false, loaded: true, errors: [] });
//
//     if (config.noResponse) {
//         Vue.log.debug('NoResponse flag, skipping set response.');
//
//         return;
//     }
//
//     if (config.setter) {
        console.log('custom setter firing...');
        // commit(
        //     config.setter.name,
        //     { options: config.setter.options, resourceData: response.data }
        // );
    // } else {
        console.log('update setter firing...');
        // commit('UPDATE', { module: config.module, resource: config.resource, resourceData: response.data });
    // }
// };
//
// export const setError = ({ commit }, { config, response }) => {
//     commit('SET_STATUS',
//         { resource: config.status || config.resource, loading: false, loaded: false, errors: response.data });
// };
//
// export const checkStatus = ({ commit, getters }, { resource }) => {
//     if (getters.status(resource) === undefined) {
        console.log('adding status');
        // commit('ADD_STATUS', resource);
    // }
// };