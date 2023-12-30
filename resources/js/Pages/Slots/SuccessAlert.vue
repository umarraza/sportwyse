<script setup>
const props = defineProps({
  message: {
    type: String,
    required: false,
  }
});
</script>
<template>
    <div class="alert alert-success alert-dismissible fade show">
        {{ message }}
    </div>
</template>