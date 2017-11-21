import Vue from 'vue';
import queryString from 'query-string';
import _ from 'lodash';
import uriTemplate from 'uri-templates';

export const UPDATE = (state, { module, resource, field, value, resourceData, defaultValue }) => {
    if (!defaultValue) {
        defaultValue = '';  // eslint-disable-line no-param-reassign
    }

    if (state[module][resource] === undefined) {
        Vue.log.debug('setting resource');
        Vue.set(state[module], resource, resourceData || {});
    }
    /**
     * Passing resourceData overrides everything sets the resource and returns.
     */
    if (resourceData) {
        Vue.log.debug('setting resource default');
        state[module][resource] = resourceData;
        return;
    }

    /**
     * If we included a field value but is undefined in the store create it...
     */
    if (field && state[module][resource][field] === undefined) {
        Vue.log.debug('setting field and default');
        Vue.set(state[module][resource], field, defaultValue);
    }

    /**
     * Are we trying to set this field to a value, if so do it...
     */
    if (value !== undefined) {
        state[module][resource][field] = value;
    }
};

export const UPDATE_RESOURCE = (state, { resource, value }) => {
    state[resource] = value;
};

export const UPDATE_RESOURCE_STATUS = (state, { resource, value }) => {
    state.status[resource] = value;
};

export const UPDATE_MODULE_RESOURCE = (state, { module, resource, value }) => {
    state[module][resource] = value;
};

export const UPDATE_MODULE_FIELD = (state, { module, resource, field, value }) => {
    if (state[module][resource][field] === undefined) {
        Vue.set(state[module][resource], field, value);

        return;
    }

    state[module][resource][field] = value;
};


export const UPDATE_SUBRESOURCE_BY_INDEX = (state, { module, resource, field, index, sub_field, value }) => {
    state[module][resource][field][index][sub_field] = value;
};

export const UPDATE_RESOURCE_BY_INDEX = (state, { module, resource, index, field, value }) => {
    state[module][resource][index][field] = value;
};

export const ADD_PROPERTY_TO_STORE = (state, { module, resource, field, initialValue }) => {
    Vue.log.debug('add property to store');
    const value = initialValue || '';
    Vue.set(state[module][resource], field, value);
};

export const PUSH_INTO_RESOURCE = (state, { module, resource, value }) => {
    state[module][resource].push(value);
};

export const CLEAR_RESOURCE = (state, { module, resource }) => {
    Vue.set(state[module], resource, {});
};

export const UPDATE_LOOKUP_FIELD = (state, { path, field, value }) => {
    const reference = path.split('.').reduce((obj, index) => obj[index], state);

    if (reference && reference[field]) {
        Vue.log.debug(`setting lookup value:${value} on:${field} at:${path}`);
        reference[field] = value;
    }
};

export const UPDATE_LOOKUP_RESOURCE = (state, { path, value }) => {
    let reference = path.split('.').reduce((obj, index) => obj[index], state); // eslint-disable-line no-unused-vars

    reference = value;
};

export const ADD_STATUS = (state, resource) => {
    Vue.set(state.status, resource, { loading: false, loaded: false, errors: [] });
};

export const SET_STATUS = (state, { resource, loading, loaded, errors }) => {
    state.status[resource].loading = loading !== undefined ? loading : state.status[resource].loading;
    state.status[resource].loaded = loaded !== undefined ? loaded : state.status[resource].loaded;
    state.status[resource].errors = errors !== undefined ? errors : state.status[resource].errors;
};

export const SET_PAGE_STATUS = (state, { loading, loaded, errors }) => {
    state.page.loading = loading !== undefined ? loading : state.page.loading;
    state.page.loaded = loaded !== undefined ? loaded : state.page.loaded;
    state.page.errors = errors !== undefined ? errors : state.page.errors;
};

export const SET_PAGE_MESSAGE = (state, message) => {
    Vue.log.debug('set page message');
    state.page.message = message;
};

export const SET_BREADCRUMBS = (state, { links, settings }) => {
    state.breadcrumbs.links = links;
    state.breadcrumbs.settings = settings;
};

export const SET_SETTINGS_STYLE = (state, {icon_class, button_class, label}) => {
    state.breadcrumbs.settings.icon_class = icon_class;
    state.breadcrumbs.settings.button_class = button_class;
    state.breadcrumbs.settings.label = label;
};

export const ADD_ALERT = (state, alert) => {
    state.alerts.push(alert);
};

export const ADD_MODAL = (state, modal) => {
    state.modal = modal;
};

export const READ_URL_PARAMETERS = (state) => {
    state.url.search = queryString.parse(location.search);
    state.url.hash = queryString.parse(location.hash);
};
