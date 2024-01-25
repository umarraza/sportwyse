<template>
    <AppLayout title="Transactions">
      <div class="row">
        <div class="col-12">
          <div class="card m-b-30">
            <div class="card-header">
              <h4 class="pl-2">Transactions</h4>
              <div class="card-header-right">
                <AddButton :routeLink="route('club.stripe.data.store')"> Import</AddButton>
              </div>
            </div>
            <div class="card-body">
              <div class="table-rep-plugin">
                <div class="table-responsive b-0" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table  table-striped">
                    <thead>
                      <tr>
                        <th>Month</th>
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
                      <tr v-for="(transaction, index) in transactions" :key="index">
                        <!--  -->
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
  import { Link } from '@inertiajs/vue3';
  import { router } from '@inertiajs/vue3';
  
  defineProps({
    transactions: {
      type: Object,
      required: true
    }
  });
  
  const deleteTeam = (teamId) => {
    if (confirm("Are you sure you want to delete this team?")) {
      router.delete(route('club.teams.destroy', teamId));
    }
  };
  
  </script>