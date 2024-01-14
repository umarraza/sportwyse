<template>
  <AppLayout title="Players">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-4">Players</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.teams.index')"> Back</BackToList>
              <AddButton :routeLink="route('club.teams.players.add', team.id)" class="btn btn-success ml-1"> Add Players</AddButton>
            </div>
          </div>
          <div class="card-body">
            <div class="table-rep-plugin">
              <div class="table-responsive b-0" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table  table-striped">
                  <thead>
                    <tr>
                      <th>Photo</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Parent Name</th>
                      <th>Parent Email</th>
                      <th>Parent Phone</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(player, index) in players" :key="index">
                      <td>-</td>
                      <td>{{ player.user.first_name }}</td>
                      <td>{{ player.user.last_name }}</td>
                      <td>{{ `${player.guardian.user.first_name} ${player.guardian.user.last_name}` }}</td>
                      <td>{{ player.guardian.user.email }}</td>
                      <td>{{ player.guardian.phone }}</td>
                      <div class="modal fade" :class="`teams-modal-${player.id}`" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title mt-0" id="myLargeModalLabel">Teams</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="teams-table" class="table table-xs table-striped">
                                  <thead>
                                    <tr>
                                      <th><strong>Team Name</strong></th>
                                      <th><strong>Activity</strong></th>
                                      <th><strong>Start Date</strong></th>
                                      <th><strong>End Date</strong></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr v-for="(team, index) in player.teams" :key="index">
                                      <td>{{ team.name }}</td>
                                      <td>{{ team.activity }}</td>
                                      <td>{{ team.start_date }}</td>
                                      <td>{{ team.end_date }}</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
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
import BackToList from "@/Pages/Slots/BackToList.vue";

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
</script>