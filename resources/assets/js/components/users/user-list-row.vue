<template>
    <tr>
        <th v-for="column in columns">
            <a v-if="column.link" :href="column.link(resource)">{{resource[column['column']]}}</a>
            <span v-else>{{resource[column['column']]}}</span>
        </th>
    </tr>
</template>

<script>
    // import lpButton from 'app/components/lp-button.vue';

    module.exports = {
        mixins: [],
        props: ['resource', 'columns'],
        components: {
        },
        data: function(){
            return {
            }
        },
        computed: {
        },
        watch: {
        },
        mounted() {
        },
        methods: {
        },
        events: {
        }
    }
</script>