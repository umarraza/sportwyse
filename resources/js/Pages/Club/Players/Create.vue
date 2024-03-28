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
              <div class="form-group row">
                <InputLabel for="first_name" class="col-sm-2 col-form-label" value="First Name" />
                <div class="col-sm-10">
                  <TextInput id="first_name" v-model="form.first_name" type="text" class="mt-1 block w-full" autofocus
                    autocomplete="first_name" />
                  <InputError class="mt-2" :message="form.errors.first_name" />
                </div>
              </div>
              <div class="form-group row">
                <InputLabel for="last_name" class="col-sm-2 col-form-label" value="First Name" />
                <div class="col-sm-10">
                  <TextInput id="last_name" v-model="form.last_name" type="text" class="mt-1 block w-full" autofocus
                    autocomplete="last_name" />
                  <InputError class="mt-2" :message="form.errors.last_name" />
                </div>
              </div>
              <div class="form-group row">
                <InputLabel for="email" class="col-sm-2 col-form-label" value="Email" />
                <div class="col-sm-10">
                  <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" autofocus
                    autocomplete="email" />
                  <InputError class="mt-2" :message="form.errors.email" />
                </div>
              </div>
              <div class="form-group row">
                <InputLabel for="gender" class="col-sm-2 col-form-label" value="Gender" />
                <div class="col-sm-10">
                  <select class="form-control" v-model="form.gender">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  <InputError :message="form.errors.gender" />
                </div>
              </div>
              <div class="form-group row">
                <label for="example-search-input" class="col-sm-2 col-form-label">Birth Date</label>
                <div class="col-sm-10">
                  <VueDatePicker position="left" :enable-time-picker="false" v-model="form.birth_date"
                    auto-apply />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Select Parent</label>
                <div class="col-sm-10">
                  <model-select :options="guardiansOptions" v-model="form.guardian_id" placeholder="Select Parent">
                  </model-select>
                  <InputError class="mt-2" :message="form.errors.guardian_id" />
                </div>
              </div>
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
import { useForm } from '@inertiajs/vue3';
import CancelButton from "@/Pages/Slots/CancelButton.vue";
import { ModelSelect } from "vue-search-select"
import "vue-search-select/dist/VueSearchSelect.css"

const props = defineProps({
  guardians: {
    type: Array,
    required: true,
  },
  errors: Object,
});

const guardiansOptions = props.guardians.map((parent) => {
  return {
    value: parent.id,
    text: parent.user.first_name + ' ' + parent.user.last_name,
  }
});

const form = useForm({
  first_name: '',
  last_name: '',
  birth_date: new Date(),
  gender: '',
  email: '',
  guardian_id: '',
});

const submit = () => {

  props.errors = {};

  form.transform(data => ({
    ...data,
  })).post(route('club.players.store'), {
    onFinish: (response) => {
      document.querySelector('.modal-close-btn').click();
    },
  });
};
</script>