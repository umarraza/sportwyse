<template>
  <div class="card m-b-30">
    <div class="card-header">
      <h4 class="pl-2"></h4>
      <div class="card-header-right">
        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
          data-target=".add-transaction-modal"><i class="fas fa-plus"></i> Add</button>
        <AddTransactionModal :player="player" />
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive b-0" data-pattern="priority-columns">
        <table class="table table-xs table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Player Name</th>
              <th>Event Name</th>
              <th>Status</th>
              <th>Date</th>
              <th>Amount</th>
              <th>Type</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(transaction, index) in player.transactions" :key="index">
              <td>{{ index + 1 }}</td>
              <td>{{ playerName() }}</td>
              <td>{{ transaction.camp.name }}</td>
              <td v-html="transaction.status_lebel"></td>
              <td>{{ transaction.date_label }}</td>
              <td>{{ transaction.amount }}</td>
              <td>{{ transaction.payment_type }}</td>
              <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-primary" data-toggle="modal" :data-target="`.edit-transaction-modal-${transaction.id}`">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button type="button" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                  </button>
                  <EditTransactionModal :transaction="transaction" :player="player" />
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
  
<script setup>
import { defineProps } from 'vue';
import AddButton from "@/Pages/Slots/AddButton.vue";
import AddTransactionModal from "@/Pages/Club/Players/Includes/Transactions/Create.vue";
import EditTransactionModal from "@/Pages/Club/Players/Includes/Transactions/Edit.vue";

const props = defineProps({
  player: {
    type: Object,
    required: true
  }
});

const playerName = () => {
  return `${props.player.user.first_name} ${props.player.user.last_name}`;
};

</script>
  
<style scoped>
/* Your component-specific styles go here */
</style>