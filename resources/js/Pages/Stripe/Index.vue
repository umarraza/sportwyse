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
              <div class="col-md-3">
                <div class="form-group">
                  <label class="col-form-label">Select New Event</label>
                  <model-select :options="campOptions" v-model="filters.camp_id" placeholder="Select New Event"
                    @blur="onselect(index, item)">
                    <template v-slot="{ option }">
                      <span>{{ option.text }}</span>
                    </template>
                  </model-select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="col-form-label">Select New Player</label>
                  <model-select :options="playerOptions" v-model="filters.player_id" placeholder="Select New Player"
                    @blur="onselect(index, item)">
                    <template v-slot="{ option }">
                      <span>{{ option.text }}</span>
                    </template>
                  </model-select>
                </div>
              </div>
              <div class="col-md-3">
                <label class="col-form-label">Cusomer Email</label>
                <TextInput id="email" v-model="filters.email" type="text" placeholder="Cusomer Email" class="block w-full"
                  autofocus autocomplete="email" />
              </div>
              <div class="col-md-3">
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
              <div class="col-md-3">
                <label class="col-form-label">Customer Description</label>
                <TextInput id="customer_description" v-model="filters.customer_description" type="text"
                  placeholder="Customer Description" class="block w-full" autofocus autocomplete="customer_description" />
              </div>
              <div class="col-md-3">
                <label class="col-form-label">Customer ID</label>
                <TextInput id="customer_id" v-model="filters.customer_id" type="text" placeholder="Customer ID"
                  class="block w-full" autofocus autocomplete="customer_id" />
              </div>
              <div class="col-md-3">
                <label class="col-form-label">Event Name</label>
                <TextInput id="event_name" v-model="filters.event_name" type="text" placeholder="Event Name"
                  class="block w-full" autofocus autocomplete="event_name" />
              </div>
              <div class="col-md-3">
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
            <div class="row mt-3">
              <div class="col-md-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="allUnAssigned" v-model="filters.allUnAssigned"
                    data-parsley-multiple="groups" data-parsley-mincheck="2">
                  <label class="custom-control-label" for="allUnAssigned">All Un Assigned</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="allAssigned" v-model="filters.allAssigned"
                    data-parsley-multiple="groups" data-parsley-mincheck="2">
                  <label class="custom-control-label" for="allAssigned">All Assigned</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="unAssignedByEvent"
                    v-model="filters.unAssignedByEvent" data-parsley-multiple="groups" data-parsley-mincheck="2">
                  <label class="custom-control-label" for="unAssignedByEvent">Un Assigned (By Event)</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="assignedByEvent"
                    v-model="filters.assignedByEvent" data-parsley-multiple="groups" data-parsley-mincheck="2">
                  <label class="custom-control-label" for="assignedByEvent">Assigned (By Event)</label>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="unAssignedByPlayer"
                    v-model="filters.unAssignedByPlayer" data-parsley-multiple="groups" data-parsley-mincheck="2">
                  <label class="custom-control-label" for="unAssignedByPlayer">Un Assigned (By Player)</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="assignedByPlayer"
                    v-model="filters.assignedByPlayer" data-parsley-multiple="groups" data-parsley-mincheck="2">
                  <label class="custom-control-label" for="assignedByPlayer">Assigned (By Player)</label>
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
            <div class="card-header-right">
              <Link :href="route('transaction.batch-update.index')" class="btn btn-warning mr-1">
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
            <Pagination :links="transactions.links" />
            <div class="table-responsive b-0" data-pattern="priority-columns">
              <table class="table table-xs table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th @click="orderByParam('customer_email')">Customer Email <i class="fas fa-long-arrow-alt-up"></i><i class="fas fa-long-arrow-alt-down"></i></th>
                    <th>Event Name (New)</th>
                    <th>Player Name (New)</th>
                    <th @click="orderByParam('event_name')">Event Name (Old) <i class="fas fa-long-arrow-alt-up"></i><i class="fas fa-long-arrow-alt-down"></i></th>
                    <th @click="orderByParam('description')">Player Name (Old) <i class="fas fa-long-arrow-alt-up"></i><i class="fas fa-long-arrow-alt-down"></i></th>
                    <th>Status</th>
                    <th @click="orderByParam('created_date')">Created Date <i class="fas fa-long-arrow-alt-up"></i><i class="fas fa-long-arrow-alt-down"></i></th>
                    <th>Customer ID</th>
                    <th>Invoice Number</th>
                    <th @click="orderByParam('amount')">Amount <i class="fas fa-long-arrow-alt-up"></i><i class="fas fa-long-arrow-alt-down"></i></th>
                    <th>Customer Description</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(transaction, index) in transactions.data" :key="index">
                    <td>{{ index + 1 }}</td>
                    <td>{{ transaction.customer_email }}</td>
                    <td>{{ transaction.camp.name }}</td>
                    <td>{{ playerName(transaction.player) }}</td>
                    <td>{{ transaction.event_name }}</td>
                    <td>{{ transaction.description }}</td>
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
import { watch, reactive, ref } from 'vue';
import Pagination from '@/Shared/Pagination.vue';
import { defaults } from 'lodash';
import { ModelSelect } from 'vue-search-select'
import { useToast } from "vue-toastification";
const toast = useToast();

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
  orderByParam: ref(''),
  orderBy: ref('asc')
}));

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

const orderByParam = (param) => {
  filters.orderBy = filters.orderBy === 'asc' ? 'desc' : 'asc';
  filters.orderByParam = param;
  runFilters();
}

const processing = ref(false);

const proccessData = () => {

  const options = {
    preserveState: true,
    preserveScroll: true,
    replace: true,
  }

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
.dp__input {
  padding: 0.3rem 0.5rem 0.2rem 2.5rem !important;
}

.active {
  background-color: #30419b !important;
  color: #fff !important;
}
</style>