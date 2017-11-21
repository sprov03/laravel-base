<template>
    <div class="form-group" :class="{'is-invalid': hasError}">
        <label v-if="label" :class="{'text-danger': hasError}">{{label}}</label>
        <input-field :class="{'is-invalid': hasError}" :resource="resource" :set-resource="setResource" :property="property" :type="type || 'text'" :placeholder="placeholder || ''"></input-field>
        <div v-if="hasError">
            <div class="text-danger" v-for="error in resourceStatus.errors[property]">{{error}}</div>
        </div>
        <slot></slot>
    </div>
</template>

<script>
    import inputField from './input-field.vue';

    module.exports = {
        props: ['resource', 'setResource', 'resourceStatus', 'property', 'label', 'type', 'placeholder'],
        components: {
            inputField
        },
        watch:{
            'thisProperty': {
                handler:function(newValue, oldValue) {
                    if (this.hasError) {
                        this.resourceStatus.errors[this.property] = undefined;
                        delete this.resourceStatus.errors[this.property];
                    }
                }
            }
        },
        computed: {
            hasError() {
                if (! this.resourceStatus || ! this.resourceStatus.errors) {
                    return false;
                }

                return this.resourceStatus.errors[this.property] ? true : false;
            },
            thisProperty() {
                return this.resource[this.property];
            }
        }

    }
</script>