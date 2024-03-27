<template>
  <AppLayout title="Camps">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="pl-2"><i class="fas fa-filter"></i> Filters</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label">Search By Coach</label>
                  <input type="text" placeholder="Search By Coach" class="form-control" v-model="filters.coachName">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Gender</label>
                  <select class="form-control" v-model="filters.gender">
                    <option value="">Select Gender</option>
                    <option value="boys">Male</option>
                    <option value="girls">Female</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" v-model="filters.status">
                    <option value="">Select Status</option>
                    <option value="1">Enabled</option>
                    <option value="0">Disabled</option>
                  </select>
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
            <h4 class="pl-2">Coaches</h4>
            <div class="card-header-right">
              <AddButton :routeLink="route('club.coaches.create')"> Add</AddButton>
            </div>
          </div>
          <div class="card-body">
            <div class="table-rep-plugin">
              <div class="table-responsive b-0" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table  table-striped">
                  <thead>
                    <tr>
                      <th>Coach Name</th>
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
                    <tr v-for="(coach, index) in coaches.data" :key="index">
                      <td>{{ coach.name }}</td>
                      <td>
                        <Link href="" class="">{{ coach.staff_members_count }}</Link>
                      </td>
                      <td>{{ coach.gender }}</td>
                      <td>{{ formatDate(coach.start_date) }}</td>
                      <td>{{ formatDate(coach.end_date) }}</td>
                      <td>
                        <svg v-if="coach.status" stroke="currentColor" fill="currentColor" stroke-width="0"
                          viewBox="0 0 16 16" color="#0cf10c" height="1em" width="1em"
                          xmlns="http://www.w3.org/2000/svg" style="color: rgb(12, 241, 12);">
                          <circle cx="8" cy="8" r="8"></circle>
                        </svg>
                        <svg v-else stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                          color="#0cf10c" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"
                          style="color: rgb(241, 12, 88);">
                          <circle cx="8" cy="8" r="8"></circle>
                        </svg>
                      </td>
                      <td>
                        <Link :href="route('club.coaches.players.index', coach.id)">Players ({{ coach.players_count }})
                        </Link>
                      </td>
                      <td>
                        <div class="btn-group btn-group-sm ml-auto menu-actions align-self-center">
                          <ShowButton :routeLink="route('club.coaches.show', coach.id)"></ShowButton>
                          <EditButton :routeLink="route('club.coaches.edit', coach.id)"></EditButton>
                          <button type="button" class="btn btn-danger btn-sm waves-effect waves-light"
                            @click="deleteCoach(coach.id)">
                            <i class="fa fa-trash"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <Pagination :links="coaches.links" />
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
import { watch, reactive } from 'vue';
import { defaults } from 'lodash';
import moment from 'moment';
import Pagination from '@/Shared/Pagination.vue';

const props = defineProps({
  coaches: {
    type: Object,
    required: true
  },
  filters: Object,
});

const filters = reactive(defaults({}, props.filters, {
  coachName: '',
  gender: '',
  status: '',
}));

watch(filters, () => {
  runFilters();
}, { deep: true });

const runFilters = () => {
  router.get('/club/coaches', filters, {
    preserveState: true,
    preserveScroll: true,
    replace: true,
  });
};

const formatDate = (date, format = 'M-D-YYYY') => {
  return date ? moment(date).format(format) : '-';
};

const resetFilters = () => {
  filters.coachName = '';
  filters.gender = '';
  filters.status = '';
  runFilters();
};

const deleteCoach = (coachId) => {
  if (confirm("Are you sure you want to delete this coach?")) {
    router.delete(route('club.coaches.destroy', coachId));
  }
};

</script>