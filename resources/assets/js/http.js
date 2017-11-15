let Http = {};
let axios = require('axios');

Http.install = function (Vue, options) {
    Vue.prototype.$httpGet = function(resource, urlParams, query) {
        let url = this.$store.state.modules[resource].default.state.url(...(urlParams || []));

        return axios.get(url, query)
            .then((response) => {
                this.$store.commit('UPDATE_RESOURCE', {name: resource, value: response.data});
            })
            .catch((response) => {
                alert(response.data.message);
            });
    };

    Vue.prototype.$httpPost = function(resource, urlParams, fieldBag) {
        let url = this.$store.state.modules[resource].default.state.url(...(urlParams || []));

        return axios.post(url, fieldBag)
            .then((response) => {
                this.$store.commit('UPDATE_RESOURCE', {name: resource, value: response.data});
            })
            .catch((response) => {
                alert(response.data.message);
            });
    };

    Vue.prototype.$httpPut = function(resource,  fieldBag) {
        return this.$store.dispatch('update', {
            'resource': resource,
            'resource_variables': urlParams,
            'fieldBag': fieldBag
        });
    };

    Vue.prototype.$httpDelete = function(resource) {
        return this.$store.dispatch('remove', {
            'resource': resource,
            'resource_variables': urlParams
        });
    };
};

export default Http;/**
 * Created by shawnpivonka on 11/14/17.
 */
