<script setup>
import { Link } from '@inertiajs/vue3';
import { reactive } from 'vue';

const props = defineProps({
  routeLink: {
    type: String
  },
  class: {
    type: String,
    default: 'btn-primary'
  }
});
</script>

<template>
  <Link :href="routeLink" class="btn" :class="class">
    <i class="fas fa-plus"></i>
    <span><slot>Add</slot> </span>
  </Link>
</template>