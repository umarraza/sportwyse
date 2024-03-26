<template>
  <AppLayout title="Create Player">
    <div class="row">
      <div class="col-12">
        <div class="card ">
          <div class="card-header">
            <h4 class="pl-2">Create Player</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.players.index')"> Back</BackToList>
            </div>
          </div>
          <div class="card-body">
            <form @submit.prevent="submit">
              <div class="form-group">
                <div>
                  <CancelButton :routeLink="route('club.players.index')" />
                  <button type="submit" class="btn btn-primary waves-effect ml-1 waves-light">Submit</button>
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
import CancelButton from "@/Pages/Slots/CancelButton.vue";

const props = defineProps({
  staff: {
    type: Object,
    required: true,
  },
  errors: Object,
});

let staffOptions = props.staff;

const form = useForm({
  status: '1',
  gender: 'Male',
  name: '',
  staff: [],
  birth_year_start_date: new Date(),
  birth_year_end_date: new Date(),
});

const submit = () => {

  props.errors = {};

  form.transform(data => ({
    ...data,
  })).post(route('club.players.store'), {
    onFinish: (response) => {
      console.log(response);
    },
  });
};


</script>

<style src="@vueform/multiselect/themes/default.css"></style>
