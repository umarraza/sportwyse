<script setup>

import AppLayout from '@/Pages/Staff/Layouts/AppLayout.vue';
import AddButton from "@/Pages/Slots/AddButton.vue";
import Players from "@/Pages/Staff/Teams/Players.vue";
import AddPlayer from "@/Pages/Staff/Teams/AddPlayer.vue";
import { Link } from '@inertiajs/vue3';

defineProps({
  teams: {
    type: Object,
    required: true
  },
  players: {
    type: Object,
    required: true
  },
  errors: {
    type: Object,
    required: false
  }
});
</script>
<template>
  <AppLayout title="Teams">
    <SuccessAlert v-if="$page.props.flash.success" :message="$page.props.flash.success" />
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-4">Teams</h4>
          </div>
          <div class="card-body">
            <div class="table-rep-plugin">
              <div class="table-responsive b-0" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table  table-striped">
                  <thead>
                    <tr>
                      <th>Team Name</th>
                      <th>Players</th>
                      <th>Gender</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Status</th>
                      <th>Register</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(team, index) in teams" :key="index">
                      <td>{{ team.name }}</td>
                      <td>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                          :data-target="`.staffMembersModal${team.id}`"><i class="fas fa-users"></i> ({{
                            team.players_count }})</button>
                      </td>
                      <td>{{ team.gender }}</td>
                      <td>{{ team.start_date }}</td>
                      <td>{{ team.end_date }}</td>
                      <td>
                        <svg v-if="team.is_archived" stroke="currentColor" fill="currentColor" stroke-width="0"
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
                      <td></td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <button class="btn btn-primary" data-toggle="modal" :data-target="`.addPlayers${team.id}`"><i
                              class="fa fa-plus"></i> Add Players</button>
                        </div>
                        <AddPlayer :team="team" :players="players" :errors="errors" />
                      </td>
                      <Players :team="team" />
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