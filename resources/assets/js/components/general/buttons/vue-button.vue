<template>
    <button :class="classes" @click="clicked" :disabled="isDisabled"><span :class="{ 'fa fa-spinner fa-spin': isLoading}"></span>
        {{ buttonLabel }}
    </button>
</template>

<script>
    module.exports = {
        data: function(){
            return {
                classSet: {
                    save: {
                        ready: 'btn btn-primary',
                        pending: 'btn btn-primary',
                        success: 'btn btn-success',
                        error: 'btn btn-danger',
                    },
                    delete: {
                        ready: 'btn btn-danger',
                        pending: 'btn btn-warning',
                        success: 'btn btn-success',
                        error: 'btn btn-danger',
                    }
                },
                status: 'ready'
            }
        },
        props: {
            labels: {
                type: Object,
                default: function () {
                    return {
                        ready: 'Save',
                        pending: 'Saving...',
                        success: 'Saved',
                        error: 'Error Saving',
                    }
                }
            },
            disabled: {
                type: Boolean,
                default: false
            },
            onClick: {
                required: true,
                type: Function
            },
            action: {
                required: true,
                type: String,
                default: 'save'
            }
        },
        computed: {
            needsConfirmation() {
                return (this.confirmationMessage);
            },
            classes() {
                if (this.disabled) {
                    return 'btn btn-disabled';
                }

                return this.classSet[this.action][this.status];
            },
            isDisabled() {
                return (this.disabled || ! this.status === 'ready');
            },
            isLoading() {
                return this.status === 'pending';
            },
            buttonLabel() {
                return this.labels[this.status];
            }
        },
        methods: {
            clicked() {
                if (this.needsConfirmation) {
                    this.confirm();

                    return;
                }

                this.process();
            },
            reset() {
                this.status = 'ready';
            },
            process() {
                this.status = 'pending';

                this.onClick()
                .then((response) => {
                    this.status = 'success';
                })
                .catch((error) => {
                    this.status = 'error';
                })
            }
        }
    }
</script>