<template>
  <AppLayout title="Players">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-2">{{ team.name }}</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.reports')"> Back</BackToList>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <h4>Event Name: {{ camp.name }}</h4>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-12">
              <div class="table-responsive b-0" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table  table-striped">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Status</th>
                      <th>Jan</th>
                      <th>Feb</th>
                      <th>Mar</th>
                      <th>Apr</th>
                      <th>May</th>
                      <th>Jun</th>
                      <th>Jul</th>
                      <th>Aug</th>
                      <th>Sep</th>
                      <th>Oct</th>
                      <th>Nov</th>
                      <th>Dec</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(player, index) in players" :key="index">
                      <td>{{ player.user.first_name }}</td>
                      <td>{{ player.user.last_name }}</td>
                      <td>{{ player.pivot.status }}</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <div class="btn-group btn-group-sm ml-auto menu-actions align-self-center">
                          <Link :href="route('club.team.reports.final', [team.id, player.id])" class="btn btn-success">
                            <i class="fas fa-chart-bar"></i> View Report
                          </Link>
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
import Pagination from '@/Shared/Pagination.vue';
import { Link } from '@inertiajs/vue3';
import BackToList from "@/Pages/Slots/BackToList.vue";

defineProps({
  team: {
    type: Object,
    required: true
  },
  camp: {
    type: Object,
    required: true
  },
  players: {
    type: Object,
    required: true
  }
});

</script>