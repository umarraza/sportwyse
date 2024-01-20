<template>
  <AppLayout title="Teams">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-2">Team Details</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.teams.index')" class="mr-1"> Back</BackToList>
              <EditButton :routeLink="route('club.teams.edit', team.id)"> Add</EditButton>
            </div>
          </div>
          <div class="card-body">
            <table class="table">
              <tr>
                <th>Name</th>
                <td>{{ team.name }}</td>
                <th>Status</th>
                <td>
                  <svg v-if="team.status" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                    color="#0cf10c" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"
                    style="color: rgb(12, 241, 12);">
                    <circle cx="8" cy="8" r="8"></circle>
                  </svg>
                  <svg v-else stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                    color="#0cf10c" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"
                    style="color: rgb(241, 12, 88);">
                    <circle cx="8" cy="8" r="8"></circle>
                  </svg>
                </td>
              </tr>
              <tr>
                <th>Birth Year Start Date</th>
                <td>{{ team.start_date }}</td>
                <th>Birth Year End Date</th>
                <td>{{ team.end_date }}</td>
              </tr>
              <tr>
                <th>Gender</th>
                <td>{{ team.gender }}</td>
                <th></th>
                <td></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="pl-2">Staff</h4>
          </div>
          <div class="card-body">
            <table id="teams-table" class="table table-xs table-striped">
              <thead>
                <tr>
                  <th><strong>Staff Name</strong></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(staff, index) in team.staff_members" :key="index">
                  <td>{{ `${staff.user.first_name} ${staff.user.last_name}` }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from "@/Pages/Club/Layouts/AppLayout.vue";
import EditButton from "@/Pages/Slots/EditButton.vue";
import BackToList from "@/Pages/Slots/BackToList.vue";

const props = defineProps({
  team: {
    type: Object,
    required: true,
  }
});
</script>