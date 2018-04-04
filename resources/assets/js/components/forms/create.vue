<template>
    <div>
        <div class="row margin-bottom-md">
            <div class="col-12">
                <h1 class="pull-left">Create Form</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <forms-form></forms-form>
            </div>
        </div>
    </div>
</template>

<script>
    import formsForm from './form.vue';

    export default {
        name: 'form',
        data() {
            return {
            };
        },
        components: {
            formsForm
        },
    };
</script>