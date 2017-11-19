<template>
    <div>
        <div class="row margin-bottom-md">
            <div class="col-xs-12">
                <h1 class="pull-left">Users</h1>
                <a class="btn btn-success margin-bottom-md pull-right margin-top-md" href="/api/users/create">
                    Create User
                </a>
            </div>
        </div>

        <div class="row" v-if="! pageLoaded">
            <div class="col-xs-12">
                Loading Users...
                <!--<loading-and-errors loading-message="Loading Products..."></loading-and-errors>-->
            </div>
        </div>

        <div v-else class="row">
            <div class="col-xs-12">

                <div class="col-sm-6">
                    <!--<search :callback="searchProducts"></search>-->
                </div>
                <div class="col-sm-6">
                    <div class="pull-right">
                        <!--<pagination :pagination="pagination" :callback="searchProducts"></pagination>-->
                    </div>
                </div>

                <table id="users-table" class="table table-responsive table-striped table-bordered">
                    <thead>
                    <tr>
                        <th v-for="column in columns">{{ column.header }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" is="user-list-row" :resource="user" :columns="columns"></tr>
                    </tbody>
                </table>

                <!--<pagination :pagination="pagination" :callback="searchProducts"></pagination>-->
            </div>
        </div>
    </div>
</template>

<script>
    import _ from 'lodash';
    import userModules from '../../store/modules/Users';
    import axios from 'axios';

    export default {

        name: 'users',
        data() {
            return {
                pageLoaded: false,
                columns: [
                    {
                        header: 'Name',
                        column: 'name',
                        link(user) {
                        }
                    },
                    {
                        header: 'Email',
                        column: 'email'
                    },
                ],
            };
        },
        mixins: [],
        components: {
            userListRow: require('./user-list-row.vue'),
        },
        computed: {
            users() {
                return this.$store.state.users;
            }
        },
        mounted() {
            Promise.all([
                this.$httpGet('users'),
                this.$httpGet('forms'),
                this.$httpGet('sites'),

            ])
            .then(() => {
                this.pageLoaded = true;
            });
        },
        methods: {
        },
    };
</script>