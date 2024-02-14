<template>
  <AppLayout title="Edit Team">
    <div class="row">
      <div class="col-12">
        <div class="card" style="height: 150%;">
          <div class="card-header">
            <h4 class="pl-2">Edit Team</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('staff.teams.index')"> Back</BackToList>
            </div>
          </div>
          <div class="card-body">
            <form @submit.prevent="submit">
              <div class="form-group row">
                <InputLabel for="status" class="col-sm-2 col-form-label" value="Status" />
                <div class="col-sm-10">
                  <label for>
                    <input name="type" type="radio" value="1" v-model="form.status" />
                    Enable
                  </label>
                  <label for class="ml-2">
                    <input name="type" type="radio" value="0" v-model="form.status" />
                    Disable
                  </label>
                </div>
              </div>
              <div class="form-group row">
                <InputLabel for="name" class="col-sm-2 col-form-label" value="Gender" />
                <div class="col-sm-10">
                  <label for>
                    <input name="gender" type="radio" value="Male" v-model="form.gender" />
                    Male
                  </label>
                  <label for class="ml-2">
                    <input name="gender" type="radio" value="Female" v-model="form.gender" />
                    Female
                  </label>
                </div>
              </div>
              <div class="form-group row">
                <InputLabel for="name" class="col-sm-2 col-form-label" value="Team Name" />
                <div class="col-sm-10">
                  <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" autofocus
                    autocomplete="username" />
                  <InputError class="mt-2" :message="form.errors.name" />
                </div>
              </div>
              <div class="form-group row">
                <label for="example-search-input" class="col-sm-2 col-form-label">Birth Year Start Date</label>
                <div class="col-sm-10">
                  <VueDatePicker position="left" :enable-time-picker="false" v-model="form.birth_year_start_date"
                    auto-apply />
                </div>
              </div>
              <div class="form-group row">
                <label for="example-search-input" class="col-sm-2 col-form-label">Birth Year End Date</label>
                <div class="col-sm-10">
                  <VueDatePicker position="left" :enable-time-picker="false" v-model="form.birth_year_end_date"
                    auto-apply />
                </div>
              </div>
              <div class="form-group">
                <div>
                  <CancelButton :routeLink="route('staff.teams.index')" />
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
import AppLayout from "@/Pages/Staff/Layouts/AppLayout.vue";
import BackToList from "@/Pages/Slots/BackToList.vue";
import Multiselect from "@vueform/multiselect";
import { useForm } from '@inertiajs/vue3';
import CancelButton from "@/Pages/Slots/CancelButton.vue";


const props = defineProps({
  team: {
    type: Object,
    required: true,
  },
  currentStaff: {
    type: Object,
    required: true
  },
  errors: Object,
});

let staffOptions = props.staff;

const form = useForm({
  status: props.team.status,
  gender: props.team.gender,
  name: props.team.name,
  staff: props.currentStaff,
  birth_year_start_date: props.team.start_date,
  birth_year_end_date: props.team.end_date,
});

const submit = () => {

  props.errors = {};

  form.transform(data => ({
    ...data,
  })).put(route('staff.teams.update', props.team.id), {
    onFinish: (response) => {
      console.log(response);
    },
  });
};


</script>

<style src="@vueform/multiselect/themes/default.css"></style>
