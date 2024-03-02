<template>
  <div class="card">
    <div class="card-body">
      <table class="table">
        <tr>
          <th>Parent Name</th>
          <td>
            {{ player.guardian.user.first_name }} {{ player.guardian.user.last_name }}
          </td>
        </tr>
        <tr>
          <th>Relationship With Child</th>
          <td>{{ player.guardian.relationship_with_child }}</td>
        </tr>
        <tr>
          <th>Parent Phone</th>
          <td>{{ player.guardian.phone }}</td>
        </tr>
        <tr>
          <th>Parent Email</th>
          <td>{{ player.guardian.user.email }}</td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  player: {
    type: Object,
    required: true
  }
});

</script>

<style scoped>
/* Your component-specific styles go here */
</style>