<template>
  <AppLayout title="Transactions">
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
                  <label class="col-form-label">Event</label>
                  <model-select :options="campOptions" v-model="filters.camp_id" placeholder="Event"
                    @blur="onselect(index, item)">
                    <template v-slot="{ option }">
                      <span>{{ option.text }}</span>
                    </template>
                  </model-select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label">Player</label>
                  <model-select :options="playerOptions" v-model="filters.player_id" placeholder="Player"
                    @blur="onselect(index, item)">
                    <template v-slot="{ option }">
                      <span>{{ option.text }}</span>
                    </template>
                  </model-select>
                </div>
              </div>
              <div class="col-md-4">
                <label class="col-form-label">Cusomer Email</label>
                <TextInput id="email" v-model="filters.email" type="text" placeholder="Cusomer Email" class="block w-full"
                  autofocus autocomplete="email" />
              </div>
              <div class="col-md-4">
                <label class="col-form-label">Status</label>
                <select class="form-control" v-model="filters.status">
                  <option :value="null">(none)</option>
                  <option value="Canceled">Canceled</option>
                  <option value="Failed">Failed</option>
                  <option value="Paid">Paid</option>
                  <option value="Refunded">Refunded</option>
                  <option value="Requires Confirmation">Requires Confirmation</option>
                  <option value="Requires Payment Method">Requires Payment Method</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="col-form-label">Customer ID</label>
                <TextInput id="customer_id" v-model="filters.customer_id" type="text" placeholder="Customer ID"
                  class="block w-full" autofocus autocomplete="customer_id" />
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label">Paginate By Size</label>
                  <select class="form-control" v-model="filters.paginateBySize">
                    <option value="">(none)</option>
                    <option value="10">10</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                    <option value="500">500</option>
                    <option value="700">700</option>
                    <option value="900">900</option>
                    <option value="1000">1000</option>
                  </select>
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
            <h4 class="pl-2">Transactions</h4>
          </div>
          <div class="card-body">
            <div class="pagination-container">
              <div class="total">
                <h5>Total ({{ transactions.data.length }})</h5>
              </div>
              <div class="pagination">
                <Pagination :links="transactions.links" />
              </div>
            </div>
            <div class="table-responsive b-0" data-pattern="priority-columns">
              <table class="table table-xs table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Customer Email</th>
                    <th>Event Name (New)</th>
                    <th>Player Name (New)</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Customer ID</th>
                    <th>Invoice Number</th>
                    <th>Amount</th>
                    <th>Customer Description</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(transaction, index) in transactions.data" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ transaction.customer_email }}</td>
                    <td>{{ transaction.camp.name }}</td>
                    <td>{{ playerName(transaction.player) }}</td>
                    <td v-html="transaction.status_lebel"></td>
                    <td>{{ transaction.date_label }}</td>
                    <td>{{ transaction.customer_id }}</td>
                    <td>{{ transaction.invoice_number }}</td>
                    <td>{{ transaction.amount }}</td>
                    <td>{{ transaction.customer_description }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <Pagination :links="transactions.links" />
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
  
<script setup>

import "vue-search-select/dist/VueSearchSelect.css"
import { Link, router } from '@inertiajs/vue3';
import AppLayout from "@/Pages/Club/Layouts/AppLayout.vue";
import AddButton from "@/Pages/Slots/AddButton.vue";
import { watch, reactive } from 'vue';
import Pagination from '@/Shared/Pagination.vue';
import { defaults } from 'lodash';
import { ModelSelect } from 'vue-search-select'

const props = defineProps({
  transactions: Object,
  camps: Object,
  players: Object,
  filters: Object,
});

const playerName = (player) => {
  return player.user ? `${player.user.first_name} ${player.user.last_name}` : '';
};

const playerOptions = props.players.map((player) => {
  return {
    value: player.id,
    text: player.user.name,
  }
});

const campOptions = props.camps.map((camp) => {
  return {
    value: camp.id,
    text: camp.name,
  }
});

const onselect = (index, item) => {
  setTimeout(() => {
  }, 10);
};
const filters = reactive(defaults({}, props.filters, {
  player_id: '',
  camp_id: '',
  email: '',
  customer_description: '',
  customer_id: '',
  event_name: '',
  status: null,
  allUnAssigned: false,
  unAssignedByEvent: false,
  unAssignedByPlayer: false,
  allAssigned: false,
  paginateBySize: '100',
  assignedByEvent: false,
  assignedByPlayer: false,
}));

watch(filters, () => {
  runFilters();
}, { deep: true });

const runFilters = () => {
  router.get('/transactions', filters, {
    preserveState: true,
    preserveScroll: true,
    replace: true,
  });
};

</script>

<style scoped>
.dp__input {
  padding: 0.3rem 0.5rem 0.2rem 2.5rem !important;
}

.active {
  background-color: #30419b !important;
  color: #fff !important;
}

.pagination-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
</style>