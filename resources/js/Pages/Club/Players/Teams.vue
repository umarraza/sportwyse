<template>
  <AppLayout title="Players">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-4">Players</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.players.index')"> Back</BackToList>
            </div>
          </div>
          <div class="card-body">
            <div class="table-rep-plugin">
              <div class="table-responsive b-0" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table  table-striped">
                  <thead>
                    <tr>
                      <th>Team Name</th>
                      <th>Gender</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(team, index) in teams" :key="index">
                      <td>{{ team.name }}</td>
                      <td>{{ team.gender }}</td>
                      <td>{{ team.start_date }}</td>
                      <td>{{ team.end_date }}</td>
                      <td>
                        <button :class="['btn', team.pivot.status === 'Primary' ? 'btn-success' : 'btn-info']"
                          @click="changeStatus(team)">{{ team.pivot.status }}</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>

import AppLayout from '@/Pages/Club/Layouts/AppLayout.vue';
import { Link, router } from '@inertiajs/vue3';

const props = defineProps({
  player: {
    type: Object,
    required: true
  },
  teams: {
    type: Object,
    required: true
  },
});

const changeStatus = (team) => {

  const status = team.pivot.status === 'Primary' ? 'Guest' : 'Primary';

  const data = {
    status: status
  };

  if (confirm('Are you sure you want to update the status?')) {
    router.post(route('club.players.teams.update-status', [props.player.id, team.id]), data);
  }
};
</script>