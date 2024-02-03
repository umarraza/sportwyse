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
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Select Event to Asign</label>
                    <model-select :options="eventOptions" v-model="event_name" placeholder="Select Event">
                      <template v-slot="{ option }">
                        <span>{{ option.text }}</span>
                      </template>
                    </model-select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-form-label">Select Player to Assign</label>
                    <model-select :options="playerTransactionOptions" v-model="player_name" placeholder="Select Player">
                      <template v-slot="{ option }">
                        <span>{{ option.text }}</span>
                      </template>
                    </model-select>
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
                    <label class="col-form-label">Event Name</label>
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
                    <label class="col-form-label">Player Name</label>
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
                <CancelButton :routeLink="route('transaction.batch-update.index')" />
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
import { watch, reactive, ref } from 'vue';
import { ModelSelect } from 'vue-search-select'
import "vue-search-select/dist/VueSearchSelect.css"
import { useForm } from '@inertiajs/vue3';
import AppLayout from "@/Pages/Club/Layouts/AppLayout.vue";
import { router } from '@inertiajs/vue3';
import Pagination from '@/Shared/Pagination.vue';
import CancelButton from "@/Pages/Slots/CancelButton.vue";

const props = defineProps({
  camps: Object,
  filters: Object,
  players: Object,
  transactions: Object,
  uniqueEvents: Object,
  uniquePlayers: Object,
});

const event_name = ref('');
const player_name = ref('');
const camp_id = ref('');
const player_id = ref('');

const resetFilters = () => {
  event_name = '';
  player_name = '';
};

watch(event_name, async (newEventName, oldEventName) => {
  runFilters();
});

watch(player_name, async (newPlayerName, oldPlayerName) => {
  runFilters();
});

const runFilters = () => {

  let filters = {
    event_name: event_name.value,
    player_name: player_name.value,
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

  // form.transform(data => ({
  //   ...data,
  // })).post(route('transaction-batch.update'), {
  //   preserveState: true,
  //   onSuccess: () => {
  //     form.reset();
  //   },
  // });
};

</script>