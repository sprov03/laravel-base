<template>
    <div>
        <basic-input-field v-model="form.name" label="Name" :errors.sync="errors.name"></basic-input-field>
        <basic-input-field v-model="form.email" label="Email" :errors.sync="errors.email"></basic-input-field>
        <basic-input-field v-model="form.password" label="Password" :errors.sync="errors.password"></basic-input-field>

        <vue-button class="pull-right" :on-click="saveForm" action="save" ref="updateFormButton"></vue-button>
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
            form() {
                return this.$store.state.form;
            }
        },
        methods: {
            saveForm() {
                if (this.form.id) {
                    return this.$httpPut('form', {id: this.form.id}, this.form)
                    .catch(this.setErrors);
                } else {
                    return this.$httpPost('form', {}, this.form)
                    .catch(this.setErrors);
                }
            },
            setErrors(error) {
                this.errors = error.response.data;

                throw error;
            }
        },
        watch:{
            'form': {
                handler:function(newValue, oldValue) {
                    this.$nextTick(() => {
                        if (_.isEmpty(this.errors)) {
                            this.$refs.updateFormButton.reset();
                        }
                    });

                    this.$store.commit('updateResource', {resource: 'form', value: newValue});
                },
                deep: true
            }
        }
    }
</script>