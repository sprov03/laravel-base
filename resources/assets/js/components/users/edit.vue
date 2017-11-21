<template>
    <div>
        <div class="row margin-bottom-md">
            <div class="col-12">
                <h1 class="pull-left">Edit User</h1>
            </div>
        </div>

        <div class="row" v-if="! pageLoaded">
            <div class="col-12">
                Loading Page...
            </div>
        </div>

        <div v-else>
            <users-form></users-form>
        </div>

    </div>
</template>

<script>
    import usersForm from './form.vue';

    export default {
        name: 'user',
        data() {
            return {
                pageLoaded: true,
            };
        },
        mixins: [],
        components: {
            usersForm
        },
        mounted() {
            this.$httpGet('user', {id: 5})
            .then(() => {}, () => {});
        },
    };
</script>