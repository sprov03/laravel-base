<template>
    <div>
        <div class="row margin-bottom-md">
            <div class="col-12">
                <h1 class="pull-left">Create User</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <users-form></users-form>
            </div>
        </div>
    </div>
</template>

<script>
    import usersForm from './form.vue';

    export default {
        name: 'user',
        components: {
            usersForm
        }
    };
</script>