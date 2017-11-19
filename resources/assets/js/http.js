let Http = {};
import axios from 'axios';
import template from 'uri-templates';
import pluralize from 'pluralize';

Http.install = function (Vue, options) {
    Vue.prototype.$httpGet = function(resource, urlParams, query) {
        const url = template(`/api/${pluralize(resource)}{/id}{/action}`).fill(urlParams || {});

        return axios.get(url, query || {})
            .then((response) => {
                this.$store.commit('UPDATE_RESOURCE', {resource: resource, value: response.data});
            })
            .catch((response) => {
                alert(response.data.message);

                throw response;
            });
    };

    Vue.prototype.$httpPost = function(resource, urlParams, fieldBag) {
        const url = template(`/api/${pluralize(resource)}{/id}{/action}`).fill(urlParams || {});

        return axios.post(url, fieldBag || {})
            .then((response) => {
                this.$store.commit('UPDATE_RESOURCE', {resource: resource, value: response.data});
            })
            .catch((response) => {
                alert(response.data.message);

                throw response;
            });
    };

    Vue.prototype.$httpPut = function(resource, urlParams,  fieldBag) {
        const url = template(`/api/${pluralize(resource)}{/id}{/action}`).fill(urlParams || {});

        return axios.put(url, fieldBag || {})
            .then((response) => {
                this.$store.commit('UPDATE_RESOURCE', {resource: this.$store[resource], value: response.data});
            })
            .catch((response) => {
                alert(response.data.message);

                throw response;
            });
    };

    Vue.prototype.$httpDelete = function(resource, urlParams) {
        const url = template(`/api/${pluralize(resource)}{/id}{/action}`).fill(urlParams || {});

        return axios.delete(url)
            .then((response) => {
                this.$store.commit('UPDATE_RESOURCE', {resource: resource, value: response.data});
            })
            .catch((response) => {
                alert(response.data.message);

                throw response;
            });
    };
};

export default Http;/**
 * Created by shawnpivonka on 11/14/17.
 */
