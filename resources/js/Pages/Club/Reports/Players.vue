<template>
  <AppLayout title="Players">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-2">{{ team.name }}</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.reports')" class="mr-1"> Back</BackToList>
              <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal"
                data-target=".add-transaction-modal"><i class="fas fa-plus"></i> Add Payment</button>
              <AddTransactionModal :propPlayerOptions="playerOptions" :propCampId="camp.id" :propTeamId="team.id" />
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 text-center">
                <h4>Event Name: {{ camp.name }}</h4>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="year" class="col-form-label">Select Year</label>
                  <select class="form-control form-select" v-model="filters.year"
                    @change="getYearlyData">
                    <option value="">Select Year</option>
                    <option :value="item" v-for="(item, index) in years" :key="index">{{ item }}</option>
                  </select>
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
            <div class="row mt-5">
              <div class="col-md-12">
                <div class="table-responsive b-0" data-pattern="priority-columns">
                  <table id="tech-companies-1" class="table  table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
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
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(player, index) in playersList" :key="index">
                        <td>
                          <a :href="route('club.players.details', player.id)" target="_blank">
                            {{ `${player.first_name} ${player.last_name}` }}
                          </a>
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" @click="getPayments(player, 'Jan')"
                            :data-target="`#view-payment-${player.id}`">
                            ${{ player.Jan }}
                          </a>
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" @click="getPayments(player, 'Feb')"
                            :data-target="`#view-payment-${player.id}`">
                            ${{ player.Feb }}
                          </a>
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" @click="getPayments(player, 'Mar')"
                            :data-target="`#view-payment-${player.id}`">
                            ${{ player.Mar }}
                          </a>
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" @click="getPayments(player, 'Apr')"
                            :data-target="`#view-payment-${player.id}`">
                            ${{ player.Apr }}
                          </a>
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" @click="getPayments(player, 'May')"
                            :data-target="`#view-payment-${player.id}`">
                            ${{ player.May }}
                          </a>
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" @click="getPayments(player, 'Jun')"
                            :data-target="`#view-payment-${player.id}`">
                            ${{ player.Jun }}
                          </a>
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" @click="getPayments(player, 'Jul')"
                            :data-target="`#view-payment-${player.id}`">
                            ${{ player.Jul }}
                          </a>
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" @click="getPayments(player, 'Aug')"
                            :data-target="`#view-payment-${player.id}`">
                            ${{ player.Aug }}
                          </a>
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" @click="getPayments(player, 'Sep')"
                            :data-target="`#view-payment-${player.id}`">
                            ${{ player.Sep }}
                          </a>
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" @click="getPayments(player, 'Oct')"
                            :data-target="`#view-payment-${player.id}`">
                            ${{ player.Oct }}
                          </a>
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" @click="getPayments(player, 'Nov')"
                            :data-target="`#view-payment-${player.id}`">
                            ${{ player.Nov }}
                          </a>
                        </td>
                        <td>
                          <a href="#" data-toggle="modal" @click="getPayments(player, 'Dec')"
                            :data-target="`#view-payment-${player.id}`">
                            ${{ player.Dec }}
                          </a>
                        </td>
                        <div class="modal fade" :id="`view-payment-${player.id}`" tabindex="-1" role="dialog"
                          aria-labelledby="mySmallModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title mt-0" id="mySmallModalLabel">{{ player.first_name }} {{
              player.last_name }} - {{ monthName }}</h5>
                                <button type="button" class="close modal-close-btn" data-dismiss="modal"
                                  aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>Transaction Date</th>
                                      <th>Amount</th>
                                      <th>Payment Method</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr v-for="(payment, index) in payments" :key="index">
                                      <td>{{ payment.date }}</td>
                                      <td>{{ payment.amount }}</td>
                                      <td>{{ payment.payment_type }}</td>
                                    </tr>
                                  </tbody>
                                </table>
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
        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->
  </AppLayout>
</template>

<script setup>

import AppLayout from '@/Pages/Club/Layouts/AppLayout.vue';
import BackToList from "@/Pages/Slots/BackToList.vue";
import { ref, reactive, watch } from 'vue';
import AddTransactionModal from "@/Pages/Club/Reports/Transactions/Create.vue";

const props = defineProps({
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
  },
  yearDiff: {
    type: Number,
    required: true
  },
  propYears: {
    type: Array,
    required: true
  },
  from_date: {
    type: String,
    required: false
  },
  to_date: {
    type: String,
    required: false
  },
  campsOptions: {
    type: Array,
    required: true
  },
});

const playersList = ref(props.players);

const year = ref('');
const diffInYears = ref(props.yearDiff);
const years = ref(props.propYears);


const playerOptions = props.players.map((player) => {
  return {
    value: player.id,
    text: player.first_name + ' ' + player.last_name,
  }
});

const filters = reactive({
  year: ref(''),
  from_date: ref(props.from_date),
  to_date: ref(props.to_date),
  requireJson: ref(true),
});

watch(filters, () => {

  if (filters.to_date === null) {
    year.value = '';
  }

  runFilters();
}, { deep: true });

const runFilters = async () => {
  const response = await axios.get(route('club.player.reports', [props.camp.id, props.team.id]), { params: filters });
  playersList.value = response.data.players;
  diffInYears.value = response.data.yearDiff;
  years.value = response.data.propYears;
};

const getYearlyData = async () => {

  if (year.value) {

    const params = {
      from_date: props.from_date,
      to_date: props.to_date,
      year: year.value,
      requireJson: true
    };

    const response = await axios.get(route('club.player.reports', [props.camp.id, props.team.id]), { params });

    playersList.value = response.data;
  }
};


let payments = ref([]);

const monthName = ref('');

const getPayments = async (player, month) => {
  monthName.value = month;
  const response = await axios.get(route('club.reports.players.payments', {
    player_id: player.id,
    camp_id: player.camp_id,
    month: month,
    year: filters.to_date !== null ? filters.year : '',
    from_date: filters.from_date,
    to_date: filters.to_date
  }));

  payments.value = response.data;
};

</script>