<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  routeLink: {
    type: String
  }
});
</script>

<template>
  <Link :href="routeLink" class="btn btn-primary">
    <i class="fas fa-edit"></i>
  </Link>
</template>