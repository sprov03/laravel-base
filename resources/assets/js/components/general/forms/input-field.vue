<template>
    <input @input="callSetResource" :value="getResource(property)" type="type ||'text'" class="form-control" placeholder="placeholder">
</template>

<script>
    module.exports = {
        props: ['resource', 'setResource', 'property', 'type', 'placeholder'],
        methods: {
            getResource(property) {
                return this.$store.state.user[property];
            },
            callSetResource(event) {
                this.setResource(this.property, event.target.value);
            }
        }
    }
</script>