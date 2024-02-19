<script setup>
import { ref, watch, reactive } from 'vue';
import { ModelSelect } from 'vue-search-select'
import "vue-search-select/dist/VueSearchSelect.css"
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
  prop_transaction: Object,
  prop_camps: Object,
  prop_players: Object,
});

let submitting = ref(false);

const transaction = ref(props.prop_transaction);

const form = useForm({
  transaction_id: props.prop_transaction.id,
  player_id: props.prop_transaction.player_id,
  camp_id: props.prop_transaction.camp_id,
});

const campOptions = props.prop_camps.map((camp) => {
  return {
    value: camp.id,
    text: camp.name,
  }
});

const playerOptions = props.prop_players.map((player) => {
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
  form.transform(data => ({
    ...data,
  })).patch(route('transaction.update', props.prop_transaction.id), {
    preserveState: false,
    onSuccess: () => {

      document.querySelector(`#myModal${props.prop_transaction.id} .close`).click();
      // Select the modal backdrop element
      var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');

      // Check if the element exists before attempting to remove it
      if (modalBackdrop) {
        // Remove the element from the DOM
        modalBackdrop.parentNode.removeChild(modalBackdrop);
      }
    },
  });
};

</script>
<template>
  <div :id="`myModal${transaction.id}`" class="modal fade" tabindex="-1" role="dialog"
    :aria-labelledby="`myModalLabel${transaction.id}`" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form @submit.prevent="submit">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title mt-0" :id="`myModalLabel${transaction.id}`">Assign Event & Player</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table">
                  <tr>
                    <th>Customer Email</th>
                    <td>{{ transaction.customer_email }}</td>
                    <th>Player Name</th>
                    <td>{{ transaction.description }}</td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <td v-html="transaction.status_lebel"></td>
                    <th>Event Name</th>
                    <td>{{ transaction.event_name ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>Created Date</th>
                    <td>{{ transaction.created_date }}</td>
                    <th>Customer ID</th>
                    <td>{{ transaction.customer_id }}</td>
                  </tr>
                  <tr>
                    <th>Invoice Number</th>
                    <td>{{ transaction.invoice_number }}</td>
                    <th>Amount</th>
                    <td>{{ transaction.amount }}</td>
                  </tr>
                  <tr>
                    <th>Statement Descriptor</th>
                    <td>{{ transaction.statement_descriptor }}</td>
                    <th>Customer Description</th>
                    <td>{{ transaction.customer_description }}</td>
                  </tr>
                  <tr>
                    <th>Application ID</th>
                    <td>{{ transaction.application_id }}</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Event Name</label>
                  <model-select :options="campOptions" v-model="form.camp_id" placeholder="Select Event"
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
                  <model-select :options="playerOptions" v-model="form.player_id" placeholder="Select Player"
                    @blur="onselect(index, item)">
                    <template v-slot="{ option }">
                      <span>{{ option.text }}</span>
                    </template>
                  </model-select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary waves-effect waves-light" :disabled="form.processing">Save changes</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>