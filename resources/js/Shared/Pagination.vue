<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
  links: {
    type: Array,
    required: true,
  },
});
</script>

<template>
  <div>
    <nav>
      <ul class="pagination justify-content-end">
        <Link v-for="link in links" :href="link.url ?? '#'" :class="{ active: link.active }" class="page-item page-link"
          v-html="link.label">
        </Link>
      </ul>
    </nav>
  </div>
</template>

<style scoped>
.active {
  background-color: #30419b !important;
  color: #fff !important;
}
</style>