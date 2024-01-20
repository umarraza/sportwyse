<script setup>
defineProps({
    title: {
        type: String,
        required: true
    }
})
</script>

<template>
    <h4 class="pl-2">{{ title }}</h4>
</template>