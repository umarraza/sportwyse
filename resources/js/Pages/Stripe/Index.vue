<template>
  <AppLayout title="Camps">
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
                    <th>Description</th>
                    <th>Event Name</th>
                    <th>Created Date</th>
                    <th>Customer ID</th>
                    <th>Status</th>
                    <th>Invoice Number</th>
                    <th>Amount</th>
                    <th>Payment Intent ID</th>
                    <th>Currency</th>
                    <th>Fee</th>
                    <th>Is Link</th>
                    <th>Mode</th>
                    <th>Statement Descriptor</th>
                    <th>Customer Description</th>
                    <th>Customer Phone</th>
                    <th>Application ID</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(transaction, index) in transactions" :key="index">
                    <td>{{ transaction.name }}</td>
                    <td>{{ transaction.description }}</td>
                    <td>{{ transaction.event_name }}</td>
                    <td>{{ transaction.created_date }}</td>
                    <td>{{ transaction.customer_id }}</td>
                    <td>{{ transaction.status }}</td>
                    <td>{{ transaction.invoice_number }}</td>
                    <td>{{ transaction.amount }}</td>
                    <td>{{ transaction.payment_intent_id }}</td>
                    <td>{{ transaction.currency }}</td>
                    <td>{{ transaction.fee }}</td>
                    <td>{{ transaction.is_link }}</td>
                    <td>{{ transaction.mode }}</td>
                    <td>{{ transaction.statement_descriptor }}</td>
                    <td>{{ transaction.customer_description }}</td>
                    <td>{{ transaction.customer_phone }}</td>
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

const props = defineProps({
  transactions: Object,
});


</script>