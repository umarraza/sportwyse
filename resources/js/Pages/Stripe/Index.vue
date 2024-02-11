<template>
  <AppLayout title="All Transactions">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="pl-2">All Transactions</h4>
            <div class="card-header-right">
              <Link :href="route('stripe.edit')" class="btn btn-warning mr-1">
              <i class="fas fa-edit"></i>
              <span>
                Batch Update
              </span>
              </Link>
              <button class="btn btn-info mr-1" @click="proccessData" v-if="transactions.data.length">
                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true" v-if="processing"></span>
                {{ processing ? 'Processing' : 'Process Data' }} </button>
              <AddButton :routeLink="route('stripe.create')"> Import Stripe Data</AddButton>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label">Select Event (New)</label>
                  <model-select :options="campOptions" v-model="filters.newEventId" placeholder="Select Event (New)"></model-select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label">Select Player (New)</label>
                  <model-select :options="playerOptions" v-model="filters.newPlayerId" placeholder="Select Player (New)"></model-select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label">Select Event (Old)</label>
                  <model-select :options="uniqueEvents" v-model="filters.eventId" placeholder="Select Event (Old)">
                  </model-select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label">Select Player (Old)</label>
                  <model-select :options="uniquePlayers" v-model="filters.playerId" placeholder="Select Player (Old)">
                  </model-select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label">From Date</label>
                  <VueDatePicker position="left" :enable-time-picker="false" v-model="filters.fromDate" auto-apply
                    placeholder="From Date" />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label">To Date</label>
                  <VueDatePicker position="left" :enable-time-picker="false" v-model="filters.toDate" auto-apply
                    placeholder="To Date" />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label">From Amount</label>
                  <input type="number" placeholder="From Amount" v-model="filters.fromAmount" class="form-control" />
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="col-form-label">To Amount</label>
                  <input type="number" placeholder="To Amount" v-model="filters.toAmount" class="form-control" />
                </div>
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
            </div>
            <div class="row mt-3">
              <div class="col-md-12">
                <button class="btn btn-primary waves-effect ml-1 waves-light" @click.prevent="resetFilters">Reset
                  Filters</button>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-md-12">
                <div class="pagination-container">
                  <div class="total">
                    <label>Total Failed Transactions:</label>{{ totalFailedTransactionsCount }}
                    <label>Total (This Page):</label>{{ transactionsCount }}
                    <label>Total Assigned: (Event & Player)</label>{{ allAssignedCount }}
                    <label>Total Pending (Event & Player):</label>{{ unAssignedCount }}
                    <label>Total Pending (By Event):</label>{{ unAssignedByEventCount }}
                    <label>Total Pending (By Player):</label>{{ unAssignedByPlayerCount }}
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
                        <th @click="orderByParam('customer_email')">Customer Email <i
                            class="fas fa-long-arrow-alt-up"></i><i class="fas fa-long-arrow-alt-down"></i></th>
                        <th>Event Name (New)</th>
                        <th>Player Name (New)</th>
                        <th @click="orderByParam('event_name')">Event Name (Old) <i
                            class="fas fa-long-arrow-alt-up"></i><i class="fas fa-long-arrow-alt-down"></i></th>
                        <th @click="orderByParam('description')">Player Name (Old) <i
                            class="fas fa-long-arrow-alt-up"></i><i class="fas fa-long-arrow-alt-down"></i></th>
                        <th>Status</th>
                        <th @click="orderByParam('created_date')">Created Date <i class="fas fa-long-arrow-alt-up"></i><i
                            class="fas fa-long-arrow-alt-down"></i></th>
                        <th>Customer ID</th>
                        <th>Invoice Number</th>
                        <th @click="orderByParam('amount')">Amount <i class="fas fa-long-arrow-alt-up"></i><i
                            class="fas fa-long-arrow-alt-down"></i></th>
                        <th>Payment Intent ID</th>
                        <th>Statement Descriptor</th>
                        <th>Customer Description</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(transaction, index) in transactions.data" :key="index">
                        <td>{{ index + 1 }}</td>
                        <td>{{ transaction.customer_email }}</td>
                        <td>{{ transaction.camp.name ?? '-' }}</td>
                        <td>{{ playerName(transaction.player) }}</td>
                        <td>{{ transaction.event_name ?? '-' }}</td>
                        <td>{{ transaction.description ?? '-' }}</td>
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
            <div class="form-group text-right mt-3">
              <CancelButton :routeLink="route('stripe.index')" />
              <button type="submit" :disabled="filters.allAssigned === 'true'"
                class="btn btn-primary waves-effect ml-1 waves-light">Update</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { watch, ref, reactive } from 'vue';
import "vue-search-select/dist/VueSearchSelect.css"
import { ModelSelect } from 'vue-search-select'
import AppLayout from "@/Pages/Club/Layouts/AppLayout.vue";
import { Link, router } from '@inertiajs/vue3';
import Pagination from '@/Shared/Pagination.vue';
import CancelButton from "@/Pages/Slots/CancelButton.vue";

const props = defineProps({
  camps: Object,
  players: Object,
  filters: Object,
  campsOptions: Object,
  transactions: Object,
  uniqueEvents: Object,
  uniquePlayers: Object,
  playersOptions: Object,
  unAssignedCount: Number,
  allAssignedCount: Number,
  transactionsCount: Number,
  unAssignedByEventCount: Number,
  unAssignedByPlayerCount: Number,
  totalFailedTransactionsCount: Number,
  assignedByEventCount: Number,
  assignedByPlayerCount: Number,
});

const processing = ref(false);

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

const filters = reactive({
  newPlayerId: ref(props.filters.newPlayerId ?? ''),
  newEventId: ref(props.filters.newEventId ?? ''),
  toDate: ref(props.filters.toDate),
  fromDate: ref(props.filters.fromDate ?? ''),
  toAmount: ref(props.filters.toAmount ?? ''),
  fromAmount: ref(props.filters.fromAmount),
  playerId: ref(props.filters.playerId ? parseInt(props.filters.playerId) : ''),
  eventId: ref(props.filters.eventId ? parseInt(props.filters.eventId) : ''),
  paginateBySize: ref(props.filters.paginateBySize ?? 100),
  allUnAssigned: ref(props.filters.allUnAssigned ?? false),
  unAssignedByEvent: ref(props.filters.unAssignedByEvent ?? false),
  unAssignedByPlayer: ref(props.filters.unAssignedByPlayer ?? false),
  allAssigned: ref(props.filters.allAssigned ?? false),
  assignedByPlayer: ref(props.filters.assignedByPlayer ?? false),
  assignedByEvent: ref(props.filters.assignedByEvent ?? false),
  status: ref(props.filters.status ?? 'Failed'),
  orderByParam: ref(''),
  orderBy: ref('asc')
});

const orderByParam = (param) => {
  filters.orderBy = filters.orderBy === 'asc' ? 'desc' : 'asc';
  filters.orderByParam = param;
  runFilters();
}

watch(filters, () => {
  runFilters();
}, { deep: true });

const runFilters = () => {
  router.get('/stripe', filters, {
    preserveState: true,
    preserveScroll: true,
    replace: true,
  });
};

const resetFilters = () => {
  filters.newPlayerId = '';
  filters.newEventId = '';
  filters.eventId = '';
  filters.playerId = '';
  filters.fromDate = '';
  filters.toDate = '';
  filters.fromAmount = '';
  filters.toAmount = '';
  filters.paginateBySize = 100;
  filters.allUnAssigned = false;
  filters.unAssignedByEvent = false;
  filters.unAssignedByPlayer = false;
  filters.allAssigned = false;
  filters.assignedByPlayer = false;
  filters.assignedByEvent = false;
  filters.status = 'Failed';
};

const playerName = (player) => {
  return player.user ? `${player.user.first_name} ${player.user.last_name}` : '-';
};

const proccessData = () => {
  if (confirm('Are you sure you want to process data?')) {
    processing.value = true;
    router.post(route('stripe.proccess'), {}, {
      onSuccess: (response) => {
        processing.value = false;
        if (response.props.flash.warning) {
          toast.warning(response.props.flash.warning, {
            position: "bottom-left",
          });
        }
      },
      onErorr: (error) => {
        console.log(error);
      }
    });
  }
};

</script>

<style scoped>
th {
  cursor: pointer;
}

.pagination-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.total {
  display: flex;
  gap: 20px;
  /* Adjust the gap between stats as needed */
}

.total span {
  font-size: 14px;
  /* Adjust the font size as needed */
}
</style>