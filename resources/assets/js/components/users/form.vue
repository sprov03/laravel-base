<template>
    <div>
        <basic-input-field v-model="user.name" label="Name" :errors.sync="errors.name"></basic-input-field>
        <basic-input-field v-model="user.email" label="Email" :errors.sync="errors.email"></basic-input-field>
        <basic-input-field v-model="user.password" label="Password" :errors.sync="errors.password"></basic-input-field>

        <vue-button class="pull-right" :on-click="saveUser" action="save" ref="updateUserButton"></vue-button>
    </div>
</template>

<script>
    import _ from 'lodash';
    import vueButton from '../general/buttons/vue-button.vue';
    import basicInputField from '../general/forms/basic-input-field.vue';

    module.exports = {
        data() {
            return {
                errors: {}
            };
        },
        components: {
            basicInputField,
            vueButton
        },
        computed: {
            user: {
                get() {
                    return this.$store.state.user;
                },
                set(value) {
                    // this.$store.commit('sync', {object: this.$store.state.user, value: value});
                    this.$store.commit('updateResource', {resource: 'user', value: value});
                }
            }
        },
        methods: {
            saveUser() {
                if (this.user.id) {
                    return this.$httpPut('user', {id: this.user.id}, this.user)
                    .catch(this.setErrors);
                } else {
                    return this.$httpPost('user', {}, this.user)
                    .catch(this.setErrors);
                }
            },
            setErrors(error) {
                this.errors = error.response.data;

                throw error;
            }
        },
        watch:{
            'user': {
                handler:function(newValue, oldValue) {
                    this.$nextTick(() => {
                        if (this.errors) {
                            this.$refs.updateUserButton.reset();
                        }
                    });
                },
                deep: true
            }
        }
    }
</script>