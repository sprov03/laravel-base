<template>
    <div class="stream">
        <div v-for="alert in alerts" class="stream-item" :class="getColor(alert.alertable_type)">
            <div class="stream-item-left text-right">
                <div><user-time :date-time="alert.created_at" class="stream-item-left-to-right date-only font-weight-400 line-height-normal"></user-time></div>
                <div><user-time :date-time="alert.created_at" class="stream-item-left-to-right time-only font-weight-400 font-size-xs text-default"></user-time></div>
            </div>
            <div class="stream-item-right">
                <div class="stream-item-content">
                    <div class="stream-item-icn">
                        <i :class="getIcon(alert.alertable_type)" class="fa" aria-hidden="true"></i>
                    </div>
                    <div class="stream-item-line"></div>
                    <p class="font-weight-400 margin-none text-capitalize">{{getLabel(alert.alertable_type)}}</p>
                    <user-time :date-time="alert.created_at" class="stream-item-left-to-right time-at-symbol font-size-xs text-default font-weight-normal line-height-1-5"></user-time>
                    <ul class="list-unstyled font-size-xs text-default line-height-1-5">
                        <li><span class="font-weight-normal">Message:</span> {{ alert.message }}</li>
                        <li v-for="(link, text) in alert.links">
                            <a :href="link">{{ text }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import vueTable from 'app/components/general/table/table.vue';
    import collectionPage from 'app/components/general/table/collectionPage.vue';
    import userMixin from 'app/components/general/users/userMixin.vue';
    import queryMixin from 'app/components/general/table/queryMixin.vue';
    import fullName from 'app/components/general/users/fullName.vue';
    export default {
        name: 'alerts',
        data() {
            return {
                query: { page: 1 },
                labels: {
                    tasks: 'Task',
                    appointments: 'Appointment',
                    notes: 'Mention',
                    texts: 'Text',
                    calls: 'Call',
                    emails: 'Email',
                    system: 'System',
                },
                icons: {
                    tasks: 'fa-check-square',
                    appointments: 'fa-calendar-o',
                    notes: 'fa-sticky-note',
                    texts: 'fa-comment',
                    calls: 'fa-phone',
                    emails: 'fa-envelope',
                    system: 'fa-bell',
                },
                color: {
                    tasks: 'stream-royal',
                    appointments: 'stream-danger',
                    notes: 'stream-sunshine',
                    texts: 'stream-success',
                    calls: 'stream-info',
                    emails: 'stream-warning',
                    system: 'stream-default',
                },
            };
        },
        mixins: [userMixin, queryMixin],
        components: { vueTable, collectionPage, fullName },
        computed: {
            status() {
                return this.$store.getters.status('alerts');
            },
            alerts() {
                return this.$store.state.utilities.alerts.data;
            },
        },
        mounted() {
            this.$store.commit('SET_BREADCRUMBS', {
                links: [
                    { label: 'Dashboard', url: '/dashboard' },
                    { label: 'Alerts', active: true },
                ],
                settings: { },
            });
            this.$store.commit('SET_PAGE_STATUS', { loading: false });
            this.$store.dispatch('getAlerts', { query: this.query })
            .then(() => {
                this.loaded = true;
            })
            .catch((response) => {
                this.$log.error('error:', response);
            });
        },
        methods: {
            getLabel(alert) {
                return this.labels[alert] || 'System';
            },
            getIcon(alert) {
                return this.icons[alert] || 'fa-bell';
            },
            getColor(alert) {
                return this.color[alert] || 'stream-default';
            },
            alertUrl(alert) {
                return `/alerts/${alert.id}`;
            },
            updatePage(query) {
                this.query = query;
                this.$store.dispatch('getAlerts', { query });
            },
        },
    };
</script>