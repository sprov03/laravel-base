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

        <div class="row">
            <div class="col-xs-12">
                <vue-table :columns="columns" :resources="users"></vue-table>
            </div>
        </div>
    </div>
</template>

<script>
    import vueTable from '../general/tables/vue-table.vue';

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
                            return '/api/users/' + user.id + '/edit';
                        }
                    },
                    {
                        header: 'Email',
                        column: 'email'
                    },
                ],
            };
        },
        props: ['storeState'],
        components: {
            vueTable
        },
        computed: {
            users() {
                return this.$store.state.users.data;
            }
        },
        mounted() {
            this.$store.commit('setState', this.storeState);
        }
    };
</script>