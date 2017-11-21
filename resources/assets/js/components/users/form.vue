<template>
    <div>
        <basic-input-field property="name" label="Name" :resource="user" :set-resource="setUserProperty" :resource-status="userStatus"></basic-input-field>
        <basic-input-field property="email" label="Email" :resource="user" :set-resource="setUserProperty" :resource-status="userStatus"></basic-input-field>
        <basic-input-field property="password" label="Password" :resource="user" :set-resource="setUserProperty" :resource-status="userStatus"></basic-input-field>

        <vue-button class="pull-right" :on-click="saveUser" action="save" ref="updateUserButton"></vue-button>
    </div>
</template>

<script>
    import _ from 'lodash';
    import vueButton from '../general/buttons/vue-button.vue';
    import basicInputField from '../general/forms/basic-input-field.vue';

    module.exports = {
        components: {
            basicInputField,
            vueButton
        },
        computed: {
            user() {
                return this.$store.state.user;
            },
            userStatus() {
                return this.$store.state.status.user;
            }
        },
        methods: {
            saveUser() {
                if (this.user.id) {
                    return this.$httpPut('user', {id: this.user.id}, this.user);
                } else {
                    return this.$httpPost('user', {}, this.user);
                }
            },
            setUserProperty(property, value) {
                this.$store.commit('UPDATE_MODULE_RESOURCE', {module: 'user', resource: property, value: value});
            }
        },
        watch:{
            'user': {
                handler:function() {
                    this.$nextTick(() => {
                        if (_.isEmpty(this.$store.state.status.user.errors)) {
                            this.$refs.updateUserButton.reset();
                        }
                    });
                },
                deep: true
            }
        }
    }
</script>