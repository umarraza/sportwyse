<template>
  <AppLayout title="Camps">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-2">Teams</h4>
            <div class="card-header-right">
              <AddButton :routeLink="route('club.teams.create')"> Add</AddButton>
            </div>
          </div>
          <div class="card-body">
            <div class="table-rep-plugin">
              <div class="table-responsive b-0" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table  table-striped">
                  <thead>
                    <tr>
                      <th>Team Name</th>
                      <th>Staff</th>
                      <th>Gender</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Status</th>
                      <th>Players</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(team, index) in teams" :key="index">
                      <td>{{ team.name }}</td>
                      <td>
                        <Link href=""
                          class="">{{ team.staff_members_count }}</Link>
                      </td>
                      <td>{{ team.gender }}</td>
                      <td>{{ team.start_date }}</td>
                      <td>{{ team.end_date }}</td>
                      <td>
                        <svg v-if="team.status" stroke="currentColor" fill="currentColor" stroke-width="0"
                          viewBox="0 0 16 16" color="#0cf10c" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"
                          style="color: rgb(12, 241, 12);">
                          <circle cx="8" cy="8" r="8"></circle>
                        </svg>
                        <svg v-else stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                          color="#0cf10c" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"
                          style="color: rgb(241, 12, 88);">
                          <circle cx="8" cy="8" r="8"></circle>
                        </svg>
                      </td>
                      <td>
                        <Link :href="route('club.teams.players.index', team.id)"
                        >Players ({{ team.players_count }})</Link>
                      </td>
                      <td>
                        <div class="btn-group btn-group-sm ml-auto menu-actions align-self-center">
                          <ShowButton :routeLink="route('club.teams.show', team.id)"></ShowButton>
                          <EditButton :routeLink="route('club.teams.edit', team.id)"></EditButton>
                          <button type="button" class="btn btn-danger btn-sm waves-effect waves-light"
                            @click="deleteTeam(team.id)">
                            <i class="fa fa-trash"></i>
                          </button>
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

import AppLayout from '@/Pages/Club/Layouts/AppLayout.vue';
import AddButton from "@/Pages/Slots/AddButton.vue";
import EditButton from "@/Pages/Slots/EditButton.vue";
import ShowButton from "@/Pages/Slots/ShowButton.vue";
import { Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

defineProps({
  teams: {
    type: Object,
    required: true
  }
});

const deleteTeam = (teamId) => {
  if (confirm("Are you sure you want to delete this team?")) {
    router.delete(route('club.teams.destroy', teamId));
  }
};

</script>