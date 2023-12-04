<template>
  <AppLayout title="Camps">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-4">Teams</h4>
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
                      <th>Staff Members</th>
                      <th>Gender</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Status</th>
                      <th>Register</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(team, index) in teams" :key="index">
                      <td>{{ team.name }}</td>
                      <td>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                          :data-target="`.staffMembersModal${team.id}`">View ({{ team.staff_members_count }})</button>
                      </td>
                      <td>{{ team.gender }}</td>
                      <td>{{ team.start_date }}</td>
                      <td>{{ team.end_date }}</td>
                      <td >
                        <svg v-if="team.is_archived" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" color="#0cf10c" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(12, 241, 12);"><circle cx="8" cy="8" r="8"></circle></svg>
                        <svg v-else stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" color="#0cf10c" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: rgb(241, 12, 88);"><circle cx="8" cy="8" r="8"></circle></svg>
                      </td>
                      <td></td>

                      <div class="modal fade" :class="`staffMembersModal${team.id}`" tabindex="-1" role="dialog"
                        :aria-labelledby="`staffMembersModal${team.id}`" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title mt-0" :id="`staffMembersModal${team.id}`">Staff</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="table-responsive b-0" data-pattern="priority-columns">

                                <ul v-if="team.staff_members.length">
                                  <li v-for="(staff, index) in team.staff_members" :key="index">{{ `${staff.user.first_name} ${staff.user.last_name}` }}</li>
                                </ul>
                                <p v-else>No staff found.</p>

                                <!-- <table id="teams-table" class="table">
                                  <thead>
                                    <tr>
                                      <th><strong>Staff Name</strong></th>
                                      <th><strong>Email</strong></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr v-for="(staff, index) in team.staff_members" :key="index">
                                      <td>{{ `${staff.user.first_name} ${staff.user.last_name}` }}</td>
                                      <td>{{ staff.user.email }}</td>
                                    </tr>
                                  </tbody>
                                </table> -->
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
import AddButton from "@/Pages/Slots/AddButton.vue";

defineProps({
    teams: {
      type: Object,
      required: true
    }
});
</script>