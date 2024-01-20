<template>
  <AppLayout title="Players">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-2">Players</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.parents.index')" class="mr-1"> Back to Parents
              </BackToList>
            </div>
          </div>
          <div class="card-body">
            <div class="table-rep-plugin">
              <div class="table-responsive b-0" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table  table-striped">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Date of Birth</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(player, index) in players" :key="index">
                      <td>{{ player.user.first_name }}</td>
                      <td>{{ player.user.last_name }}</td>
                      <td>{{ player.birth_date }}</td>
                      <td>
                        <div class="btn-group btn-group-sm ml-auto menu-actions align-self-center">
                          <ShowButton :routeLink="route('club.parent.players.show', player.id)">Show</ShowButton>
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
import ShowButton from "@/Pages/Slots/ShowButton.vue";

const props = defineProps({
  players: {
    type: Object,
    required: true
  },
});
</script>