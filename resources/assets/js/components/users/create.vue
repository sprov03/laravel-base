<template>
    <div>
        <div class="row margin-bottom-md">
            <div class="col-12">
                <h1 class="pull-left">Create User</h1>
            </div>
        </div>

        <div class="row" v-if="! pageLoaded">
            <div class="col-12">
                Loading Page...
                <!--<loading-and-errors loading-message="Loading Products..."></loading-and-errors>-->
            </div>
        </div>

        <div v-else class="row">
            <div class="col-12">
                <basic-input-field :resource="user" :set-resource="setUserProperty" property="name" label="Name"></basic-input-field>
                <basic-input-field :resource="user" :set-resource="setUserProperty" property="email" label="Email"></basic-input-field>
                <basic-input-field :resource="user" :set-resource="setUserProperty" property="password" label="Password"></basic-input-field>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import basicInputField from '../general/forms/basic-input-field.vue';

    export default {
        name: 'user',
        data() {
            return {
                pageLoaded: true,
            };
        },
        mixins: [],
        components: {
            basicInputField
        },
        computed: {
            user() {
                return this.$store.state.user;
            },
            forms() {
                return this.$store.state.user.forms;
            }
        },
        mounted() {
            // this.$httpGet('users');
            this.$httpGet('user', {id: 5});
            // this.$httpGet('sites');
            // this.$httpGet('site', {id: 5});
            // this.$httpGet('forms');
            // this.$httpGet('form', {id: 5});
        },
        methods: {
            addForm() {
                this.$httpGet('user', {id: this.user.id + 1});
            },
            setUserProperty(property, value) {
                this.$store.commit('UPDATE_MODULE_RESOURCE', {module: 'user', resource: property, value: value});
            }
        },
    };
</script>