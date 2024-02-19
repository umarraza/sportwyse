<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="btn btn-primary btn-block btn-lg waves-effect waves-light">
        <slot />
    </button>
</template>
