<template>
    <div>
        <div class="row margin-bottom-md">
            <div class="col-12">
                <h1 class="pull-left">Edit Form</h1>
            </div>
        </div>

        <div class="row" v-if="! pageLoaded">
            <div class="col-12">
                Loading Page...
            </div>
        </div>

        <div v-else>
            <forms-form></forms-form>
        </div>

    </div>
</template>

<script>
    import formsForm from './form.vue';

    export default {
        name: 'form',
        data() {
            return {
                pageLoaded: true,
            };
        },
        mixins: [],
        components: {
            formsForm
        },
        mounted() {
            this.$httpGet('form', {id: 5})
            .then(() => {}, () => {});
        },
    };
</script>