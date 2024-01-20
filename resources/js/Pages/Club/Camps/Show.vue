<template>
  <AppLayout title="Camps">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-2">Event Details</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.camps.index')" class="mr-1"> Back</BackToList>
              <EditButton :routeLink="route('club.camps.edit', camp.id)"> Add</EditButton>
            </div>
          </div>
          <div class="card-body">
            <table class="table">
              <tr>
                <th>Name</th>
                <td>{{ camp.name }}</td>
                <th>Price</th>
                <td>${{ camp.price }}</td>
              </tr>
              <tr>
                <th>Starting At:</th>
                <td>{{ camp.start_date }}</td>
                <th>Ending At</th>
                <td>{{ camp.end_date }}</td>
              </tr>
              <tr>
                <th>Payment Type</th>
                <td>{{ camp.payment_type }}</td>
                <th>Processing Fee</th>
                <td>${{ camp.processing_fee }}</td>
              </tr>
              <tr>
                <th>Payments</th>
                <td>{{ camp.select_payment }}</td>
                <th>Processing Fees (Using Credit Card):</th>
                <td>${{ camp.processing_fee_using_credit_card }}</td>
              </tr>
              <tr>
                <th>Net Amount (Using Credit Card):</th>
                <td>${{ camp.net_amount_using_credit_card }}</td>
                <th>Total Price (Using Credit Card):</th>
                <td>${{ camp.total_price_using_credit_card }}</td>
              </tr>
              <tr>
                <th>Processing Fees (Using Bank Account):</th>
                <td>${{ camp.processing_fee_using_bank_account }}</td>
                <th>Net Amount (Using Bank Account):</th>
                <td>${{ camp.net_amount_using_bank_account }}</td>
              </tr>
              <tr>
                <th>Total Price (Using Bank Account):</th>
                <td>${{ camp.total_price_using_bank_account }}</td>
                <th>Installment</th>
                <td>{{ camp.installment }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="pl-2">Teams</h4>
          </div>
          <div class="card-body">
            <table id="teams-table" class="table table-xs table-striped">
              <thead>
                <tr>
                  <th><strong>Team Name</strong></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(team, index) in camp.teams" :key="index">
                  <td>{{ team.name }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from "@/Pages/Club/Layouts/AppLayout.vue";
import EditButton from "@/Pages/Slots/EditButton.vue";
import BackToList from "@/Pages/Slots/BackToList.vue";

const props = defineProps({
  camp: {
    type: Object,
    required: true,
  }
});
</script>