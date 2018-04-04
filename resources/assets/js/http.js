let Http = {};
import axios from 'axios';
import template from 'uri-templates';
import pluralize from 'pluralize';

Http.install = function (Vue, options) {
    Vue.prototype.$httpGet = function(resource, urlParams, query) {
        const url = template(`/api/${pluralize(resource)}{/id}{/action}`).fill(urlParams || {});

        return axios.get(url, query || {})
            .then((response) => {
                this.$store.commit('updateResource', {resource: resource, value: response.data});

                return response;
            })
            .catch((error) => {
                throw error;
            });
    };

    Vue.prototype.$httpPost = function(resource, urlParams, fieldBag) {
        const url = template(`/api/${pluralize(resource)}{/id}{/action}`).fill(urlParams || {});

        return axios.post(url, fieldBag || {})
            .then((response) => {
                this.$store.commit('updateResource', {resource: resource, value: response.data});

                return response;
            })
            .catch((error) => {
                throw error;
            });
    };

    Vue.prototype.$httpPut = function(resource, urlParams,  fieldBag) {
        const url = template(`/api/${pluralize(resource)}{/id}{/action}`).fill(urlParams || {});

        return axios.put(url, fieldBag || {})
            .then((response) => {
                this.$store.commit('updateResource', {resource: resource, value: response.data});

                return response;
            })
            .catch((error) => {
                throw error;
            });
    };

    Vue.prototype.$httpDelete = function(resource, urlParams) {
        const url = template(`/api/${pluralize(resource)}{/id}{/action}`).fill(urlParams || {});

        return axios.delete(url)
            .then((response) => {
                this.$store.commit('updateResource', {resource: resource, value: response.data});

                return response;
            })
            .catch((error) => {
                throw error;
            });
    };
};

export default Http;/**
 * Created by shawnpivonka on 11/14/17.
 */
