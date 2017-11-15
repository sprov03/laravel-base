<template>
    <div>
        <div class="row margin-bottom-md">
            <div class="col-xs-12">
                <h1 class="pull-left">Create User</h1>
            </div>
        </div>

        <div class="row" v-if="! pageLoaded">
            <div class="col-xs-12">
                Loading Page...
                <!--<loading-and-errors loading-message="Loading Products..."></loading-and-errors>-->
            </div>
        </div>

        <div v-else class="row">
            <div class="col-xs-12">
                <pre>{{this.user}}</pre>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'user',
        data() {
            return {
                pageLoaded: false,
            };
        },
        mixins: [],
        components: {
        },
        computed: {
            user() {
                return this.$store.state.user;
            }
        },
        mounted() {
            this.$store.state.modules['user'].default.actions.setNewResourceInStore()

            //.then((response) => {this.pageLoaded = true;});
        },
        methods: {
        },
    };
</script>