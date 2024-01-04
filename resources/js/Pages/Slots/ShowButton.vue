<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  routeLink: {
    type: String
  }
});
</script>

<template>
  <Link :href="routeLink" class="btn btn-success">
    <i class="fas fa-eye"></i>
  </Link>
</template>