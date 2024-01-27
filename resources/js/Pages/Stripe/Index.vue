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
              <div class="col-md-2">
                <TextInput id="email" v-model="filters.email" type="text" placeholder="Cusomer Email"
                  class="block w-full" autofocus autocomplete="email" />
              </div>
              <div class="col-md-2">
                <select class="form-control" v-model="filters.status">
                  <option value="">Status</option>
                  <option value="Canceled">Canceled</option>
                  <option value="Failed">Failed</option>
                  <option value="Paid">Paid</option>
                  <option value="Refunded">Refunded</option>
                  <option value="Requires Confirmation">Requires Confirmation</option>
                  <option value="Requires Payment Method">Requires Payment Method</option>
                </select>
              </div>
              <div class="col-md-2">
                <TextInput id="customer_description" v-model="filters.customer_description" type="text"
                 placeholder="Customer Description" class="block w-full" autofocus
                  autocomplete="customer_description" />
              </div>
              <div class="col-md-2">
                <TextInput id="customer_id" v-model="filters.customer_id" type="text"
                  placeholder="Customer ID" class="block w-full" autofocus autocomplete="customer_id" />
              </div>
              <div class="col-md-2">
                <TextInput id="event_name" v-model="filters.event_name" type="text"
                  placeholder="Event Name" class="block w-full" autofocus autocomplete="event_name" />
              </div>
              <div class="col-md-2 date-picker-column">
                <VueDatePicker position="left" :enable-time-picker="false" v-model="filters.created_date" auto-apply />
              </div>
            </div>
            <div class="row mt-5">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-2">Teams</h4>
            <div class="card-header-right">
              <AddButton :routeLink="route('stripe.create')"> Import Stripe Data</AddButton>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive b-0" data-pattern="priority-columns">
              <table class="table table-xs table-striped">
                <thead>
                  <tr>
                    <th>Customer Email</th>
                    <th>Player Name</th>
                    <th>Status</th>
                    <th>Event Name</th>
                    <th>Created Date</th>
                    <th>Customer ID</th>
                    <th>Invoice Number</th>
                    <th>Amount</th>
                    <th>Payment Intent ID</th>
                    <th>Statement Descriptor</th>
                    <th>Customer Description</th>
                    <th>Application ID</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(transaction, index) in transactionsArray" :key="index">
                    <td>{{ transaction.customer_email }}</td>
                    <td>{{ transaction.description }}</td>
                    <td v-html="transaction.status_lebel"></td>
                    <td>{{ transaction.event_name }}</td>
                    <td>{{ transaction.created_date }}</td>
                    <td>{{ transaction.customer_id }}</td>
                    <td>{{ transaction.invoice_number }}</td>
                    <td>{{ transaction.amount }}</td>
                    <td>{{ transaction.payment_intent_id }}</td>
                    <td>{{ transaction.statement_descriptor }}</td>
                    <td>{{ transaction.customer_description }}</td>
                    <td>{{ transaction.application_id }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->
  </AppLayout>
</template>
  
<script setup>
import AppLayout from "@/Pages/Club/Layouts/AppLayout.vue";
import AddButton from "@/Pages/Slots/AddButton.vue";
import axios from "axios";
import { ref, watch, reactive } from 'vue';

const props = defineProps({
  transactions: Object,
});

let transactionsArray = ref(props.transactions);

const filters = reactive({
  email: '',
  customer_description: '',
  customer_id: '',
  event_name: '',
  created_date: new Date(),
  status: '',
});

watch(filters, (newFilters, oldFilters) => {
  console.log('Filters changed:', newFilters);
  runFilters();
}, { deep: true });

const runFilters = async () => {
  const response = await axios.get(route('transactions.filter', filters));
  console.log(response);
  transactionsArray.value = response.data.transactions;
  console.log(transactionsArray.value);
};
</script>

<style scoped>
  .dp__input {
    padding: 0.3rem 0.5rem 0.2rem 2.5rem !important;
  }
</style>