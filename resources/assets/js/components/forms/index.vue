<template>
    <div>
        <div class="row margin-bottom-md">
            <div class="col-12">
                <h1 class="pull-left">Forms</h1>
                <a class="btn btn-success margin-bottom-md pull-right margin-top-md" href="/api/forms/create">
                    Create Form
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <vue-table :columns="columns" :resources="forms"></vue-table>
            </div>
        </div>
    </div>
</template>

<script>
    import formModules from '../../store/modules/Forms';
    import vueTable from '../general/tables/vue-table.vue';
    import axios from 'axios';

    export default {
        name: 'forms',
        data() {
            return {
                columns: [
                    {
                        header: 'Form Id',
                        column: 'id',
                        link(form) {
                            return '/api/forms/' + form.id + '/edit';
                        }
                    },
                    {
                        header: 'User Id',
                        column: 'user_id',
                        link(form) {
                            return '/api/users/' + form.user_id + '/edit';
                        }
                    },
                ],
            };
        },
        components: {
            vueTable
        },
        computed: {
            forms() {
                return this.$store.state.forms.data;
            }
        },
    };
</script>