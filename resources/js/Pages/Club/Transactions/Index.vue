<template>
  <AppLayout title="Batch Update Transactions">
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
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">Search Event</label>
                    <model-select :options="uniqueEvents" v-model="eventId" 
                      placeholder="Search Event">
                    </model-select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">Search Player</label>
                    <model-select :options="uniquePlayers" v-model="playerId" 
                      placeholder="Search Player">
                    </model-select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">From Date</label>
                    <VueDatePicker position="left" :enable-time-picker="false" v-model="from_date" auto-apply
                      placeholder="From Date" />
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">To Date</label>
                    <VueDatePicker position="left" :enable-time-picker="false" v-model="to_date" auto-apply
                      placeholder="To Date" />
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="col-form-label">From Amount</label>
                    <input type="number" placeholder="From Amount" v-model="from_amount" class="form-control" />
                  </div>
                </div>
                <div class="col-md-4">
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
                    <model-select :options="campsOptions" v-model="camp_id" placeholder="Select Event"
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
                    <model-select :options="playersOptions" v-model="player_id" placeholder="Select Player"
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
import "vue-search-select/dist/VueSearchSelect.css"
import { ModelSelect } from 'vue-search-select'
import AppLayout from "@/Pages/Club/Layouts/AppLayout.vue";
import { router } from '@inertiajs/vue3';
import Pagination from '@/Shared/Pagination.vue';
import CancelButton from "@/Pages/Slots/CancelButton.vue";

const props = defineProps({
  filters: Object,
  campsOptions: Object,
  playersOptions: Object,
  transactions: Object,
  uniqueEvents: Object,
  uniquePlayers: Object,
});

const to_date = ref('');
const from_date = ref('');
const camp_id = ref('');
const to_amount = ref('');
const player_id = ref('');
const from_amount = ref('');
const playerId = ref('');
const eventId = ref('');

const getEventName = () => {
  const event = props.uniqueEvents.find((event) => event.value === eventId.value);
  return event ? event.text : '';
};

const getPlayerName = () => {
  const player = props.uniquePlayers.find((player) => player.value === playerId.value);
  return player ? player.text : '';
};

const resetFilters = () => {
  eventId.value = '';
  playerId.value = '';
  from_date.value = '';
  to_date.value = '';
  from_amount.value = '';
  to_amount.value = '';
};

const runFilters = () => {

  const filters = {
    event_name: getEventName(),
    player_name: getPlayerName(),
    from_date: from_date.value,
    to_date: to_date.value,
    from_amount: from_amount.value,
    to_amount: to_amount.value,
  };

  router.get('/transactions/index', filters, {
    preserveState: true,
    preserveScroll: true,
    replace: true,
  });
};

watch(eventId, async (newEventName, oldEventName) => {
  runFilters();
});

watch(playerId, async (newPlayerName, oldPlayerName) => {
  runFilters();
});

watch(from_date, async (newFromDate, oldFromDate) => {
  runFilters();
});

watch(to_date, async (newToDate, oldToDate) => {
  runFilters();
});

watch(from_amount, async (newFromAmount, oldFromAmount) => {
  runFilters();
});

watch(to_amount, async (newToAmount, oldToAmount) => {
  runFilters();
});



const playerName = (player) => {
  return player.user ? `${player.user.first_name} ${player.user.last_name}` : '';
};

const onselect = (index, item) => {
  setTimeout(() => {
  }, 10);
};

const submit = () => {

  const data = {
    eventId: eventId.value,
    playerId: playerId.value,
    camp_id: camp_id.value,
    player_id: player_id.value,
  };

  router.post(route('transaction-batch.update'), data, {
    preserveScroll: true,
    onSuccess: () => Promise.all([]),
  });
};

</script>