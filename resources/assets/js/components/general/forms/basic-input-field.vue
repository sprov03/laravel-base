<template>
    <div class="form-group">
        <label v-if="label">{{label}}</label>
        <input-field :resource="resource" :set-resource="setResource" :property="property" :type="type" :placeholder="placeholder"></input-field>
        <slot></slot>
    </div>
</template>

<script>
    import inputField from './input-field.vue';

    module.exports = {
        props: ['resource', 'setResource', 'property', 'label', 'type', 'placeholder'],
        components: {
            inputField
        },
    }
</script>