<template>
  <AppLayout title="Teams">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-2">Team Details</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('staff.teams.index')" class="mr-1"> Back</BackToList>
              <EditButton :routeLink="route('staff.teams.edit', team.id)"> Add</EditButton>
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
  </AppLayout>
</template>

<script setup>
import AppLayout from "@/Pages/Staff/Layouts/AppLayout.vue";
import EditButton from "@/Pages/Slots/EditButton.vue";
import BackToList from "@/Pages/Slots/BackToList.vue";

const props = defineProps({
  team: {
    type: Object,
    required: true,
  }
});
</script>