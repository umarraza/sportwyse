<template>
  <AppLayout title="Camps">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4>Events</h4>
            <div class="card-header-right">
              <AddButton :routeLink="route('club.camps.create')"> Add</AddButton>
            </div>
          </div>
          <div class="card-body">
            <div class="table-rep-plugin">
              <div class="table-responsive b-0" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Price</th>
                      <th>StartingAt</th>
                      <th>EndingAt</th>
                      <th>Invoiced</th>
                      <th>Paid</th>
                      <th>Pending</th>
                      <th>Players</th>
                      <th>Teams</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(camp, index) in camps.data" :key="index">
                      <td>{{ camp.name }}</td>
                      <td>{{ camp.price }}</td>
                      <td>{{ camp.start_date }}</td>
                      <td>{{ camp.end_date }}</td>
                      <td>{{ camp.invoiced }}</td>
                      <td>{{ camp.paid }}</td>
                      <td>{{ camp.pending }}</td>
                      <td>2</td>
                      <td>
                        <button
                          type="button"
                          class="btn btn-primary waves-effect waves-light"
                          data-toggle="modal"
                          :data-target="`.teams-modal-${camp.id}`"
                        >
                          View ({{ camp.teams_count }})
                        </button>
                      </td>
                      <td>
                        <div
                          class="btn-group btn-group-sm ml-auto menu-actions align-self-center"
                        >
                          <button
                            type="button"
                            class="btn btn-success btn-sm waves-effect waves-light"
                          >
                            <i class="fa fa-eye"></i>
                          </button>
                          <button
                            type="button"
                            class="btn btn-danger btn-sm waves-effect waves-light"
                          >
                            <i class="fa fa-trash"></i>
                          </button>
                        </div>
                      </td>
                      <div
                        class="modal fade"
                        :class="`teams-modal-${camp.id}`"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="myLargeModalLabel"
                        aria-hidden="true"
                      >
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5
                                class="modal-title mt-0"
                                id="myLargeModalLabel"
                              >
                                Teams
                              </h5>
                              <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                              >
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div
                                class="table-responsive b-0"
                                data-pattern="priority-columns"
                              >
                                <table
                                  id="teams-table"
                                  class="table table-xs table-striped"
                                >
                                  <thead>
                                    <tr>
                                      <th><strong>Team Name</strong></th>
                                      <th><strong>Start Date</strong></th>
                                      <th><strong>End Date</strong></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr
                                      v-for="(team, index) in camp.teams"
                                      :key="index"
                                    >
                                      <td>{{ team.name }}</td>
                                      <td>{{ team.start_date }}</td>
                                      <td>{{ team.end_date }}</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                              >
                                Close
                              </button>
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
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from "@/Pages/Club/Layouts/AppLayout.vue";
import AddButton from "@/Pages/Slots/AddButton.vue";
const props = defineProps({
  camps: {
    type: Object,
    required: true,
  }
});
</script>