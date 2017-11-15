const state = {
    url() {
        return '/api/users';
    },
    newResource: {
        name:"",
        email: "",
    }
};

// getters
const getters = {
};

// actions
const actions = {
    setNewResourceInStore() {
        console.log('here');
        // commit('UPDATE_RESOURCE', {name: 'user', value: state.newResource});
    }
};

// mutations
const mutations = {
};

export default {
    state,
    getters,
    actions,
    mutations,
};