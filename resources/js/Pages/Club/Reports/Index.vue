<template>
  <AppLayout title="Reports">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label">Select Event</label>
                  <model-select :options="camps" v-model="filters.camp_id" placeholder="Select Event"></model-select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label">From Date</label>
                  <VueDatePicker position="left" :enable-time-picker="false" v-model="filters.from_date" auto-apply
                    placeholder="From Date" />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label">To Date</label>
                  <VueDatePicker position="left" :enable-time-picker="false" v-model="filters.to_date" auto-apply
                    placeholder="To Date" />
                </div>
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
            <h4 class="pl-2">Teams</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive b-0" data-pattern="priority-columns" v-if="teams.data">
              <table id="tech-companies-1" class="table  table-striped">
                <thead>
                  <tr>
                    <th>Team Name</th>
                    <th>Gender</th>
                    <th>Joining Date</th>
                    <th>Leaving Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(team, index) in teams.data" :key="index">
                    <td>{{ team.name }}</td>
                    <td>{{ team.gender }}</td>
                    <td>{{ formatDate(team.joining_date) }}</td>
                    <td>{{ formatDate(team.leaving_date) }}</td>
                    <td>
                      <svg v-if="team.status" stroke="currentColor" fill="currentColor" stroke-width="0"
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
                    <td>
                      <div class="btn-group btn-group-sm ml-auto menu-actions align-self-center" v-if="filters.camp_id">
                        <Link :href="`/club/camps/${filters.camp_id}/teams/${team.id}/report?from_date=${filters.from_date}&to_date=${filters.to_date}`" class="btn btn-info">
                        <i class="fas fa-chart-bar"></i> Players Reports
                        </Link>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="pagination-container">
                <div class="pagination">
                  <Pagination :links="teams.links" />
                </div>
              </div>
            </div>
            <div v-else>
              <div class="text-center">
                <p>Please select an event to view teams.</p>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->
  </AppLayout>
</template>
  
<script setup>

import "vue-search-select/dist/VueSearchSelect.css"
import AppLayout from '@/Pages/Club/Layouts/AppLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { ModelSelect } from 'vue-search-select'
import { watch, ref, reactive, onMounted } from 'vue';
import Pagination from '@/Shared/Pagination.vue';
import moment from 'moment';

const props = defineProps({
  camps: {
    type: Object,
    required: true
  },
  teams: {
    type: Object,
    required: true
  },
  prop_filters: Object,
});

const filters = reactive({
  camp_id: ref(props.prop_filters.camp_id ? parseInt(props.prop_filters.camp_id) : ''),
  from_date: ref(props.prop_filters.from_date ?? ''),
  to_date: ref(props.prop_filters.to_date ?? ''),
});

watch(filters, () => {
  runFilters();
}, { deep: true });

const runFilters = () => {
  router.get(route('club.reports'), filters, {
    preserveState: true,
    preserveScroll: true,
    replace: true,
  });
};

const formatDate = (date, format = 'M-D-YYYY') => {
  return date ? moment(date).format(format) : '-';
};

</script>

<style scoped>
.pagination-container {
  float: right;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
</style>