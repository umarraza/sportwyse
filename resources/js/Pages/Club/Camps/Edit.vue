<template>
  <AppLayout title="Camps">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-3">Edit Event</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.camps.index')"> Back</BackToList>
            </div>
          </div>
          <div class="card-body">
            <form @submit.prevent="submit">
              <div class="form-group row">
                <InputLabel for="name" class="col-sm-2 col-form-label" value="Name" />
                <div class="col-sm-10">
                  <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" autofocus
                    autocomplete="username" />
                  <InputError class="mt-2" :message="form.errors.name" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Select Teams</label>
                <div class="col-sm-10">
                  <Multiselect v-model="form.teams" mode="tags" :close-on-select="false" :searchable="true"
                    :placeholder="'Select Teams'" :create-option="true" :options="teamOptions" />
                </div>
              </div>
              <div class="form-group row">
                <label for="example-search-input" class="col-sm-2 col-form-label">Payment Type</label>
                <div class="col-sm-10">
                  <label for>
                    <input name="payment_type" type="radio" v-model="form.payment_type" value="Fixed" />
                    Fixed
                  </label>
                  <label for class="ml-2">
                    <input name="payment_type" type="radio" v-model="form.payment_type" value="Monthly" />
                    Monthly
                  </label>
                </div>
              </div>
              <div class="form-group row">
                <label for="example-search-input" class="col-sm-2 col-form-label">Select Processing Fee</label>
                <div class="col-sm-10">
                  <label for>
                    <input name="type" type="radio" v-model="form.processing_fee" value="Exclude processing fees in price"
                      @change="calculateAmount" />
                    Exclude processing fees in price
                  </label>
                  <label for class="ml-2">
                    <input name="type" type="radio" v-model="form.processing_fee" value="Include processing fees in price"
                      @change="calculateAmount" />
                    Include processing fees in price
                  </label>
                  <label for class="ml-2">
                    <input name="type" type="radio" v-model="form.processing_fee" value="Show processing fees in line" />
                    Show processing fees in line
                  </label>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-sm-2">Event Price</label>
                <div class="col-sm-10">
                  <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                    <span class="input-group-btn input-group-prepend"></span>
                    <span class="bootstrap-touchspin-prefix input-group-prepend">
                      <span class="input-group-text">$</span></span>
                    <input type="number" v-model="form.price" @input="calculateAmount" class="form-control" />
                  </div>
                  <InputError class="mt-2" :message="form.errors.price" />
                </div>
              </div>
              <div class="form-group row" v-if="form.payment_type === 'Fixed'">
                <label for="example-search-input" class="col-sm-2 col-form-label">Select Payments</label>
                <div class="col-sm-10">
                  <label for>
                    <input name="payment_pay_type" type="radio" v-model="form.payment_pay_type" value="Onetime" />
                    Onetime
                  </label>
                  <label for class="ml-2">
                    <input name="payment_pay_type" type="radio" v-model="form.payment_pay_type" value="Installments" />
                    Installments
                  </label>
                </div>
              </div>
              <div class="form-group row" v-if="form.payment_pay_type === 'Installments'">
                <label for="example-search-input" class="col-sm-2 col-form-label">Select Installments:</label>
                <div class="col-sm-10">
                  <select class="form-control" v-model="form.installment">
                    <option value="">(none)</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label class="control-label">Processing Fees (Using Credit Card):</label>
                  <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                    <span class="input-group-btn input-group-prepend"></span>
                    <span class="bootstrap-touchspin-prefix input-group-prepend">
                      <span class="input-group-text">$</span></span>
                    <input class="form-control" type="text" :value="form.processing_fee_using_credit_card" placeholder
                      readonly />
                  </div>
                </div>
                <div class="col-md-4">
                  <label class="control-label">Net Amount (Using Credit Card):</label>
                  <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                    <span class="input-group-btn input-group-prepend"></span>
                    <span class="bootstrap-touchspin-prefix input-group-prepend">
                      <span class="input-group-text">$</span></span>
                    <input class="form-control" type="text" :value="form.net_amount_using_credit_card" placeholder
                      readonly />
                  </div>
                </div>
                <div class="col-md-4">
                  <label class="control-label">Total Price (Using Credit Card):</label>
                  <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                    <span class="input-group-btn input-group-prepend"></span>
                    <span class="bootstrap-touchspin-prefix input-group-prepend">
                      <span class="input-group-text">$</span></span>
                    <input class="form-control" type="text" :value="form.total_price_using_credit_card" placeholder
                      readonly />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label class="control-label">Processing Fees (Using Bank Account):</label>
                  <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                    <span class="input-group-btn input-group-prepend"></span>
                    <span class="bootstrap-touchspin-prefix input-group-prepend">
                      <span class="input-group-text">$</span></span>
                    <input class="form-control" type="text" :value="form.processing_fee_using_bank_account" placeholder
                      readonly />
                  </div>
                </div>
                <div class="col-md-4">
                  <label class="control-label">Net Amount (Using Bank Account):</label>
                  <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                    <span class="input-group-btn input-group-prepend"></span>
                    <span class="bootstrap-touchspin-prefix input-group-prepend">
                      <span class="input-group-text">$</span></span>
                    <input class="form-control" type="text" :value="form.net_amount_using_bank_account" placeholder
                      readonly />
                  </div>
                </div>
                <div class="col-md-4">
                  <label class="control-label">Total Price (Using Bank Account):</label>
                  <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                    <span class="input-group-btn input-group-prepend"></span>
                    <span class="bootstrap-touchspin-prefix input-group-prepend">
                      <span class="input-group-text">$</span></span>
                    <input class="form-control" type="text" :value="form.total_price_using_bank_account" placeholder
                      readonly />
                  </div>
                </div>
              </div>
              <div class="form-group row mt-3">
                <label for="example-search-input" class="col-sm-2 col-form-label">Starting At :</label>
                <div class="col-sm-10">
                  <VueDatePicker position="left" :enable-time-picker="false" v-model="form.start_date" auto-apply />
                </div>
              </div>
              <div class="form-group row">
                <label for="example-search-input" class="col-sm-2 col-form-label">Ending At :</label>
                <div class="col-sm-10">
                  <VueDatePicker position="left" :enable-time-picker="false" v-model="form.end_date" auto-apply />
                </div>
              </div>
              <div class="form-group">
                <div>
                  <CancelButton :routeLink="route('club.camps.index')" />
                  <button type="submit" class="btn btn-success waves-effect ml-1 waves-light">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from "@/Pages/Club/Layouts/AppLayout.vue";
import BackToList from "@/Pages/Slots/BackToList.vue";
import Multiselect from "@vueform/multiselect";
import { useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import CancelButton from "@/Pages/Slots/CancelButton.vue";

const props = defineProps({
  camp: {
    type: Object,
    required: true,
  },
  teams: {
    type: Object,
    required: true,
  },
  currentTeams: {
    type: Object,
    required: true,
  },
  errors: Object,
});

let teamOptions = props.teams;

const form = useForm({
  type: props.camp.type,
  name: props.camp.name,
  payment_type: props.camp.payment_type,
  processing_fee: props.camp.processing_fee,
  processing_fee_using_credit_card: props.camp.processing_fee_using_credit_card,
  net_amount_using_credit_card: props.camp.net_amount_using_credit_card,
  total_price_using_credit_card: props.camp.total_price_using_credit_card,
  processing_fee_using_bank_account: props.camp.processing_fee_using_bank_account,
  net_amount_using_bank_account: props.camp.net_amount_using_bank_account,
  total_price_using_bank_account: props.camp.total_price_using_bank_account,
  price: props.camp.price,
  payment_pay_type: props.camp.payment_pay_type,
  installment: props.camp.installment,
  start_date: props.camp.start_date,
  end_date: props.camp.end_date,
  teams: props.currentTeams,
});

const calculateAmount = () => {

  let price = form.price;

  if (price) {

    const stripeProccessingFee = 2.9;

    if (form.processing_fee === "Exclude processing fees in price") {

      form.processing_fee_using_credit_card = 0;
      form.processing_fee_using_bank_account = 0;

    } else if (form.processing_fee === "Include processing fees in price") {

      form.processing_fee_using_credit_card = (price * stripeProccessingFee / 100).toFixed(2);
      form.processing_fee_using_bank_account = (price * stripeProccessingFee / 100).toFixed(2);
    }

    form.net_amount_using_credit_card = price - parseFloat(form.processing_fee_using_credit_card);
    form.net_amount_using_bank_account = price - parseFloat(form.processing_fee_using_bank_account);

    form.total_price_using_credit_card = price + parseFloat(form.processing_fee_using_credit_card);
    form.total_price_using_bank_account = price + parseFloat(form.processing_fee_using_credit_card);
  }
}

const submit = () => {

  props.errors = {};

  form.transform(data => ({
    ...data,
  })).put(route('club.camps.update', props.camp.id), {
    onFinish: (response) => {
      console.log(response);
    },
  });
};

</script>

<style src="@vueform/multiselect/themes/default.css"></style>
