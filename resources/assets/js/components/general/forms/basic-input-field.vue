<template>
    <div class="form-group" :class="{'is-invalid': hasError}">
        <label v-if="label" :class="{'text-danger': hasError}">{{label}}</label>
        <input @input="$emit('input', $event.target.value)" :value="value" :class="{'is-invalid': hasError}" type="type ||'text'" class="form-control" :placeholder="placeholder">
        <div v-if="hasError">
            <div class="text-danger" v-for="error in errors">{{error}}</div>
        </div>
        <slot></slot>
    </div>
</template>

<script>
    import inputField from './input-field.vue';

    module.exports = {
        props: ['value', 'label', 'type', 'placeholder', 'errors'],
        components: {
            inputField
        },
        watch:{
            'value': {
                handler:function(newValue, oldValue) {
                    if (this.hasError) {
                        // Custom Error Validations should go here and if passes then clear the error
                        this.$emit('update:errors', undefined);
                    }
                }
            }
        },
        computed: {
            hasError() {
                return (this.errors === [] || ! this.errors) ? false : true;
            }
        }

    }
</script>