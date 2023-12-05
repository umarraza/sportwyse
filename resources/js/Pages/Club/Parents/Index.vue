<template>
  <AppLayout title="Camps">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-4">Parents</h4>
            <div class="card-header-right">
              <AddButton :routeLink="route('club.parents.create')"> Add</AddButton>
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
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Players</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(parent, index) in parents" :key="index">
                      <td>{{ parent.user.first_name }}</td>
                      <td>{{ parent.user.last_name }}</td>
                      <td>{{ parent.user.email }}</td>
                      <td>{{ parent.phone }}</td>
                      <td>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                          :data-target="`.playersModal${parent.id}`">View ({{ parent.players_count }})</button>
                      </td>

                      <div class="modal fade" :class="`playersModal${parent.id}`" tabindex="-1" role="dialog"
                        :aria-labelledby="`playersModal${parent.id}`" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title mt-0" :id="`playersModal${parent.id}`">Players</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="table-responsive b-0" data-pattern="priority-columns">

                                <ul v-if="parent.players.length">
                                  <li v-for="(player, index) in parent.players" :key="index">{{ `${player.user.first_name} ${player.user.last_name}` }}</li>
                                </ul>
                                <p v-else>No player found.</p>
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
    parents: {
      type: Object,
      required: true
    }
});
</script>