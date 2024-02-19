<template>
  <AppLayout title="Players">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="ml-4">Players</h4>
            <p class="mb-0">{{ team.name }}</p>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('staff.teams.index')"> Back</BackToList>
              <AddButton :routeLink="route('staff.teams.players.add', team.id)" class="btn btn-success ml-1"> Add Players
              </AddButton>
            </div>
          </div>
          <div class="card-body">
            <div class="table-rep-plugin">
              <div class="table-responsive b-0" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table table-striped">
                  <thead>
                    <tr>
                      <th>Photo</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Birth Date</th>
                      <th>Status</th>
                      <th>Parent Name</th>
                      <th>Parent Email</th>
                      <th>Parent Phone</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(player, index) in players" :key="index">
                      <td>-</td>
                      <td>{{ player.user.first_name }}</td>
                      <td>{{ player.user.last_name }}</td>
                      <td>{{ player.birth_date }}</td>
                      <td>
                        <span v-if="player.pivot.status === 'Primary'" class="badge badge-success">Primary</span>
                        <span v-else class="badge badge-info">Guest</span>
                      </td>
                      <td>{{ `${player.guardian.user.first_name} ${player.guardian.user.last_name}` }}</td>
                      <td><a :href="`mailto:${player.guardian.user.email}`">{{ player.guardian.user.email }}</a></td>
                      <td>{{ player.guardian.phone }}</td>
                      <td>
                        <div class="btn-group btn-group-sm ml-auto menu-actions align-self-center">
                          <button class="btn btn-danger" @click="deletePlyaer(player.id)">Remove</button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->
  </AppLayout>
</template>
  
<script setup>

import AppLayout from '@/Pages/Staff/Layouts/AppLayout.vue';
import BackToList from "@/Pages/Slots/BackToList.vue";
import { router } from '@inertiajs/vue3';

const props = defineProps({
  players: {
    type: Object,
    required: true
  },
  team: {
    type: Object,
    required: true
  }
});

const deletePlyaer = (playerId) => {
  if (confirm('Are you sure you want to remove this player from the team?')) {
    router.delete(route('staff.teams.players.delete', [props.team.id, playerId]), {
      onSuccess: () => {
      },
    });
  }
};

</script>