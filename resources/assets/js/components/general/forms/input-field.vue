<template>
    <input @input="$emit('input', $event.target.value)" :value="value" type="type ||'text'" class="form-control" :placeholder="placeholder">
</template>

<script>
    module.exports = {
        props: ['value', 'type', 'placeholder'],
    }
</script>