import  formFields from './FormFields';
import  formFieldTypes from './FormFieldTypes';

export const actions = {
    getDefault() {
        console.log('get Default not yet implemented');
        return {
            name:"",
            email: "",
        };
    }
};
export default {
    namespaced: true,
    state () {
        return actions.getDefault();
    },
    actions,
    modules: {
        formFields,
        formFieldTypes
    }
};