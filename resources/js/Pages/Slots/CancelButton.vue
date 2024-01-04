<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  routeLink: {
    type: String
  }
});
</script>

<template>
  <Link :href="routeLink" class="btn btn-secondary waves-effect">
    <span><slot>Cancel</slot> </span>
  </Link>
</template>