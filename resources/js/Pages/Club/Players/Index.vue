<template>
  <AppLayout title="Players">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="pl-2"><i class="fas fa-filter"></i> Filters</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label class="col-form-label">First Name</label>
                  <input type="text" placeholder="First Name" class="form-control" v-model="filters.firstName">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="col-form-label">Last Name</label>
                  <input type="text" placeholder="Last Name" class="form-control" v-model="filters.lastName">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="">Gender</label>
                  <select class="form-control" v-model="filters.gender">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="">Search By Players Birth Year</label>
                  <VueDatePicker v-model="filters.year" year-picker />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <button class="btn btn-success" @click="resetFilters">Reset Filters</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-2">Players</h4>
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
                      <th>Gender</th>
                      <th>Teams</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(player, index) in players.data" :key="index">
                      <td>{{ player.user.first_name }}</td>
                      <td>{{ player.user.last_name }}</td>
                      <td>{{ player.birth_date }}</td>
                      <td>{{ player.gender }}</td>
                      <td>
                        <Link :href="route('club.players.teams', player.id)"
                        >Teams ({{ player.teams_count }})</Link>
                      </td>
                      <td>
                        <div class="btn-group btn-group-sm ml-auto menu-actions align-self-center">
                          <ShowButton :routeLink="route('club.players.details', player.id)">Show</ShowButton>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <Pagination :links="players.links" />
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
import { Link } from '@inertiajs/vue3';
import Pagination from '@/Shared/Pagination.vue';
import { defaults } from 'lodash';
import { watch, reactive, ref } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    players: {
      type: Object,
      required: true
    },
    filters: Object,
});

const filters = reactive(defaults({}, props.filters, {
  firstName: '',
  lastName: '',
  gender: '',
  year: ref(new Date().getFullYear()),
}));

watch(filters, () => {
  runFilters();
}, { deep: true });

const runFilters = () => {
  router.get('/club/players', filters, {
    preserveState: true,
    preserveScroll: true,
    replace: true,
  });
};

const resetFilters = () => {
  filters.firstName = '';
  filters.lastName = '';
  filters.gender = '';
  filters.year = '';
  runFilters();
};

</script>