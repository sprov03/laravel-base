export const actions = {
    getDefault() {
        return {
            name:"",
            email: "",
        };
    },
    initializeModule() {
        return {
            name:"",
            email: "",
        };
    }
};
export default {
    namespaced: true,
    state () {
        return [
            actions.getDefault()
        ];
    },
    actions
};