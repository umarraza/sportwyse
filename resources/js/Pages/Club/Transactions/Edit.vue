<template>
  <AppLayout title="Batch Update Transactions">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="card-body">
            <div class="ui vertical segment">
              <div class="flexbox">
                <div class="flex-content">
                  <h3>Handling Event sample</h3>
                  <div class="button-group">
                    <button type="button" @click="reset" class="small ui button">reset</button>
                    <button type="button" @click="selectOption" class="small ui button">option select from parent</button>
                  </div>
                  <div>
                    <model-select :options="options" v-model="item" @change="handleOnInput"
                      placeholder="placeholder text">
                    </model-select>
                  </div>
                </div>
                <div class="flex-result">
                  <table class="ui celled table">
                    <thead>
                      <tr>
                        <th>value</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ item }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="pl-2"><i class="fas fa-edit"></i> Batch Update Transactions</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('stripe.index')" class="mr-1"> Back</BackToList>
            </div>
          </div>
          <div class="card-body">
            <form @submit.prevent="submit">
              <div class="row mt-5">
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Search Event</label>
                    <model-select :options="eventOptions" v-model="event_name" placeholder="Search Event">
                      <template v-slot="{ option }">
                        <span>{{ option.text }}</span>
                      </template>
                    </model-select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">Search Player</label>
                    <model-select :options="playerTransactionOptions" v-model="player_name" placeholder="Search Player">
                      <template v-slot="{ option }">
                        <span>{{ option.text }}</span>
                      </template>
                    </model-select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">From Date</label>
                    <VueDatePicker position="left" :enable-time-picker="false" v-model="from_date" auto-apply
                      placeholder="From Date" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">To Date</label>
                    <VueDatePicker position="left" :enable-time-picker="false" v-model="to_date" auto-apply
                      placeholder="To Date" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">From Amount</label>
                    <input type="number" placeholder="From Amount" v-model="from_amount" class="form-control" />
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="col-form-label">To Amount</label>
                    <input type="number" placeholder="To Amount" v-model="to_amount" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-primary waves-effect ml-1 waves-light" @click.prevent="resetFilters">Reset
                    Filters</button>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-md-12">
                  <div class="table-responsive b-0" data-pattern="priority-columns">
                    <table class="table table-xs table-striped">
                      <thead>
                        <tr>
                          <th>Customer Email</th>
                          <th>Event Name</th>
                          <th>Player Name</th>
                          <th>New Event Name</th>
                          <th>New Player Name</th>
                          <th>Status</th>
                          <th>Created Date</th>
                          <th>Customer ID</th>
                          <th>Invoice Number</th>
                          <th>Amount</th>
                          <th>Payment Intent ID</th>
                          <th>Statement Descriptor</th>
                          <th>Customer Description</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(transaction, index) in transactions.data" :key="index">
                          <td>{{ transaction.customer_email }}</td>
                          <td>{{ transaction.event_name }}</td>
                          <td>{{ transaction.description }}</td>
                          <td>{{ transaction.camp.name }}</td>
                          <td>{{ playerName(transaction.player) }}</td>
                          <td v-html="transaction.status_lebel"></td>
                          <td>{{ transaction.date_label }}</td>
                          <td>{{ transaction.customer_id }}</td>
                          <td>{{ transaction.invoice_number }}</td>
                          <td>{{ transaction.amount }}</td>
                          <td>{{ transaction.payment_intent_id }}</td>
                          <td>{{ transaction.statement_descriptor }}</td>
                          <td>{{ transaction.customer_description }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <Pagination :links="transactions.links" />
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Select Event</label>
                    <model-select :options="campOptions" v-model="camp_id" placeholder="Select Event"
                      @blur="onselect(index, item)">
                      <template v-slot="{ option }">
                        <span>{{ option.text }}</span>
                      </template>
                    </model-select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Select Player</label>
                    <model-select :options="playerOptions" v-model="player_id" placeholder="Select Player"
                      @blur="onselect(index, item)">
                      <template v-slot="{ option }">
                        <span>{{ option.text }}</span>
                      </template>
                    </model-select>
                  </div>
                </div>
              </div>
              <div class="form-group text-right mt-3">
                <CancelButton :routeLink="route('stripe.index')" />
                <button type="submit" class="btn btn-primary waves-effect ml-1 waves-light">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { watch, ref } from 'vue';
// import "vue-search-select/dist/VueSearchSelect.css"
// import { ModelSelect } from 'vue-search-select'
import AppLayout from "@/Pages/Club/Layouts/AppLayout.vue";
import { router } from '@inertiajs/vue3';
import Pagination from '@/Shared/Pagination.vue';
import CancelButton from "@/Pages/Slots/CancelButton.vue";

import { ModelSelect } from "vue-search-select"
import "vue-search-select/dist/VueSearchSelect.css"

const props = defineProps({
  camps: Object,
  filters: Object,
  players: Object,
  transactions: Object,
  uniqueEvents: Object,
  uniquePlayers: Object,
});




const options = ref([
  { value: "1", text: "aa" + " - " + "1" },
  { value: "2", text: "ab" + " - " + "2" },
  { value: "3", text: "bc" + " - " + "3" },
  { value: "4", text: "cd" + " - " + "4" },
  { value: "5", text: "de" + " - " + "5" },
  { value: "6", text: "ef" + " - " + "6" },
  { value: "10", text: "ef" + " - " + "10" },
  { value: "11", text: "ef" + " - " + "11" },
  { value: "12", text: "ef" + " - " + "12" },
  { value: "13", text: "down case" + " - " + "testcase" },
  { value: "14", text: "camel case" + " - " + "testCase" },
  { value: "15", text: "Capitalize case" + " - " + "Testcase" },
  { value: "16", text: "more a" + " - " + "1" },
  { value: "17", text: "more a" + " - " + "2" },
  { value: "18", text: "more a" + " - " + "3" },
  { value: "19", text: "more a" + " - " + "4" },
  { value: "20", text: "more a" + " - " + "5" },
  { value: "21", text: "more a" + " - " + "6" },
  { value: "22", text: "more a" + " - " + "7" },
  { value: "23", text: "more a" + " - " + "8" },
  { value: "24", text: "more a" + " - " + "9" },
]);

const item = ref('');

const reset = () => {
  item.value = ""
};

const selectOption = () => {
  item.value = options.value[0].value
};


const handleOnInput = ($event) => {
  alert('klklklkl');
  item.value = $event
};












const from_date = ref();
const to_date = ref();
const from_amount = ref('');
const to_amount = ref('');
const event_name = ref(props.filters.event_name);
const player_name = '';
const camp_id = ref('');
const player_id = ref('');

const resetFilters = () => {
  event_name = '';
  player_name = '';
};

const filters = {
  event_name: event_name.value,
  player_name: player_name.value,
  from_date: from_date.value,
  to_date: to_date.value,
  from_amount: from_amount.value,
  to_amount: to_amount.value,
};

watch(event_name, async (newEventName, oldEventName) => {
  runFilters();
});

watch(player_name, async (newPlayerName, oldPlayerName) => {
  runFilters();
});

watch(from_date, async (newCampId, oldCampId) => {
  runFilters();
});
watch(to_date, async (newCampId, oldCampId) => {
  runFilters();
});
watch(from_amount, async (newCampId, oldCampId) => {
  runFilters();
});
watch(to_amount, async (newCampId, oldCampId) => {
  runFilters();
});

const runFilters = () => {

  let filters = {
    event_name: event_name.value,
    player_name: player_name.value,
    from_date: from_date.value,
    to_date: to_date.value,
    from_amount: from_amount.value,
    to_amount: to_amount.value,
  };

  router.get('/transactions/edit', filters, {
    preserveState: true,
    preserveScroll: true,
    replace: true,
  });
};

const playerName = (player) => {
  return player.user ? `${player.user.first_name} ${player.user.last_name}` : '';
};

const playerTransactionOptions = props.uniquePlayers.map((transaction) => {
  return {
    value: transaction.description,
    text: transaction.description,
  }
});

const eventOptions = props.uniqueEvents.map((transaction) => {
  return {
    value: transaction.event_name,
    text: transaction.event_name,
  }
});

const campOptions = props.camps.map((camp) => {
  return {
    value: camp.id,
    text: camp.name,
  }
});

const playerOptions = props.players.map((player) => {
  return {
    value: player.id,
    text: player.user.name,
  }
});

const onselect = (index, item) => {
  setTimeout(() => {
  }, 10);
};

const submit = () => {

  const data = {
    event_name: event_name.value,
    player_name: player_name.value,
    camp_id: camp_id.value,
    player_id: player_id.value,
  };

  router.post(route('transaction-batch.update'), data, {
    preserveScroll: true,
    onSuccess: () => Promise.all([
    ]),
    onFinish: () => {
      // enabling.value = false;
    },
  });



};

</script>