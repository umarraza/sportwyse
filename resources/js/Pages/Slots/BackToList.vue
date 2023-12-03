<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
  backToListRoute: {
    type: String
  }
});
</script>

<template>
  <Link :href="backToListRoute" class="btn btn-success">
    <i class="fas fa-arrow-alt-circle-left"></i>
    <slot>Back</slot>
  </Link>
</template>