let Http = {};
import axios from 'axios';
import template from 'uri-templates';
import pluralize from 'pluralize';

Http.install = function (Vue, options) {
    Vue.prototype.$httpGet = function(resource, urlParams, query) {
        const url = template(`/api/${pluralize(resource)}{/id}{/action}`).fill(urlParams || {});

        return axios.get(url, query || {})
            .then((response) => {
                let status = {
                    loading: false,
                    loaded: true,
                    errors: []
                };

                this.$store.commit('UPDATE_RESOURCE', {resource: resource, value: response.data});
                this.$store.commit('UPDATE_RESOURCE_STATUS', {resource: resource, value: status});

                return response;
            })
            .catch((error) => {
                let response = error.response;

                let status = {
                    loading: false,
                    loaded: false,
                    errors: response.data
                };

                this.$store.commit('UPDATE_RESOURCE_STATUS', {resource: resource, value: status});

                throw response;
            });
    };

    Vue.prototype.$httpPost = function(resource, urlParams, fieldBag) {
        const url = template(`/api/${pluralize(resource)}{/id}{/action}`).fill(urlParams || {});

        return axios.post(url, fieldBag || {})
            .then((response) => {
                let status = {
                    loading: false,
                    loaded: true,
                    errors: []
                };

                this.$store.commit('UPDATE_RESOURCE', {resource: resource, value: response.data});
                this.$store.commit('UPDATE_RESOURCE_STATUS', {resource: resource, value: status});

                return response;
            })
            .catch((error) => {
                let response = error.response;

                let status = {
                    loading: false,
                    loaded: false,
                    errors: response.data
                };

                this.$store.commit('UPDATE_RESOURCE_STATUS', {resource: resource, value: status});

                throw response;
            });
    };

    Vue.prototype.$httpPut = function(resource, urlParams,  fieldBag) {
        const url = template(`/api/${pluralize(resource)}{/id}{/action}`).fill(urlParams || {});

        return axios.put(url, fieldBag || {})
            .then((response) => {
                let status = {
                    loading: false,
                    loaded: true,
                    errors: []
                };

                this.$store.commit('UPDATE_RESOURCE', {resource: resource, value: response.data});
                this.$store.commit('UPDATE_RESOURCE_STATUS', {resource: resource, value: status});

                return response;
            })
            .catch((error) => {
                let response = error.response;

                let status = {
                    loading: false,
                    loaded: false,
                    errors: response.data
                };

                this.$store.commit('UPDATE_RESOURCE_STATUS', {resource: resource, value: status});

                throw response;
            });
    };

    Vue.prototype.$httpDelete = function(resource, urlParams) {
        const url = template(`/api/${pluralize(resource)}{/id}{/action}`).fill(urlParams || {});

        return axios.delete(url)
            .then((response) => {
                let status = {
                    loading: false,
                    loaded: true,
                    errors: []
                };

                this.$store.commit('UPDATE_RESOURCE', {resource: resource, value: response.data});
                this.$store.commit('UPDATE_RESOURCE_STATUS', {resource: resource, value: status});

                return response;
            })
            .catch((error) => {
                let response = error.response;

                let status = {
                    loading: false,
                    loaded: false,
                    errors: response.data
                };

                this.$store.commit('UPDATE_RESOURCE_STATUS', {resource: resource, value: status});

                throw response;
            });
    };
};

export default Http;/**
 * Created by shawnpivonka on 11/14/17.
 */
