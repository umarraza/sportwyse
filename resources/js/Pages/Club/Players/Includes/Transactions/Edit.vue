<template>
  <form @submit.prevent="submit">
    <div :class="['modal fade', `edit-transaction-modal-${transaction.id}`]" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title mt-0" :id="`myLargeModalLabel${transaction.id}`">{{ playerName() }}</h5>
            <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Date</label>
                  <div class="col-sm-8">
                    <VueDatePicker position="left" :enable-time-picker="false" v-model="form.date" auto-apply
                      placeholder="Date" />
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" for="eventId">Amount:</label>
                  <div class="col-sm-8">
                    <TextInput id="name" v-model="form.amount" type="number" class="mt-1 block w-full" autofocus
                    autocomplete="amount" />
                  <InputError class="mt-2" :message="form.errors.amount" />
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label" for="playerId">Status:</label>
                  <div class="col-sm-8">
                    <select class="form-control" v-model="form.payment_type">
                      <option value="Cash">Cash</option>
                      <option value="Credit">Credit</option>
                      <option value="Scholarship">Scholarship</option>
                      <option value="Injury">Injury</option>
                      <option value="On Break">On Break</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Select Event</label>
                  <div class="col-sm-8">
                    <model-select :options="campsOptions" v-model="form.camp_id" placeholder="Search Event">
                    </model-select>
                  <InputError class="mt-2" :message="form.errors.camp_id" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary waves-effect ml-1 waves-light">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>
    
<script setup>
import { defineProps, inject } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { ModelSelect } from 'vue-search-select'
import "vue-search-select/dist/VueSearchSelect.css"

const props = defineProps({
  transaction: {
    type: Object,
    required: true
  },
  player: {
    type: Object,
    required: true
  },
});

const campsOptions = inject('campsOptions')

const playerName = () => {
  return `${props.player.user.first_name} ${props.player.user.last_name}`;
};

const form = useForm({
  date: props.transaction.created_date,
  amount: props.transaction.amount,
  payment_type: props.transaction.payment_type,
  camp_id: props.transaction.camp_id,
});

const submit = () => {

  form.transform(data => ({
    ...data,
  })).patch(route('club.players.transactions.update', props.transaction.id), {
    onFinish: () => {
      document.querySelector('.modal-close-btn').click();
    },
  });
  form.reset();
};


</script>