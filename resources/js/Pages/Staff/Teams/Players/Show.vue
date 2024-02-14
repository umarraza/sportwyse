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
                  <th>First Name</th>
                  <td>{{ player.user.first_name }}</td>
                  <th>Last Name</th>
                  <td>{{ player.user.last_name }}</td>
                </tr>
                <tr>
                  <th>Birth Year Start Date</th>
                  <td>{{ team.start_date }}</td>
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
  import AppLayout from "@/Pages/Club/Layouts/AppLayout.vue";
  import EditButton from "@/Pages/Slots/EditButton.vue";
  import BackToList from "@/Pages/Slots/BackToList.vue";
  
  const props = defineProps({
    player: {
      type: Object,
      required: true,
    }
  });
  </script>