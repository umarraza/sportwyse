<template>
  <AppLayout title="Creae Player">
    <div class="row">
      <div class="col-12">
        <div class="card ">
          <div class="card-header">
            <h4 class="pl-2">Crate Player</h4>
            <span class="pl-2">{{ parent.name }}</span>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.parents.index')"> Back</BackToList>
            </div>
          </div>
          <div class="card-body">
            <form @submit.prevent="submit">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mb-0 row">
                    <InputLabel for="first_name" class="col-sm-2 col-form-label" value="First Name" />
                    <div class="col-sm-12">
                      <TextInput id="first_name" v-model="form.first_name" type="text" placeholder="First Name"
                        class="block w-full" autofocus autocomplete="username" />
                      <InputError :message="form.errors.first_name" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-0 row">
                    <InputLabel for="last_name" class="col-sm-2 col-form-label" value="Last Name" />
                    <div class="col-sm-12">
                      <TextInput id="last_name" v-model="form.last_name" type="text" placeholder="Last Name"
                        class="block w-full" autofocus autocomplete="username" />
                      <InputError :message="form.errors.last_name" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-0 row">
                    <InputLabel for="first_name" class="col-sm-2 col-form-label" value="Birthday" />
                    <div class="col-sm-12">
                      <VueDatePicker position="left" :enable-time-picker="false" v-model="form.birth_day" auto-apply />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-0 row">
                    <InputLabel for="phone" class="col-sm-2 col-form-label" value="Pone" />
                    <div class="col-sm-12">
                      <TextInput id="phone" v-model="form.phone" type="text" placeholder="Pone"
                        class="block w-full" autofocus autocomplete="username" />
                      <InputError :message="form.errors.phone" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-0 row">
                    <InputLabel for="email" class="col-sm-2 col-form-label" value="Email" />
                    <div class="col-sm-12">
                      <TextInput id="email" v-model="form.email" type="text" placeholder="Email"
                        class="block w-full" autofocus autocomplete="username" />
                      <InputError :message="form.errors.email" />
                    </div>
                  </div>
                </div>




                <div class="col-md-6">
                  <div class="form-group mb-0 row">
                    <InputLabel for="gender" class="col-sm-2 col-form-label" value="Gender" />
                    <div class="col-sm-12">
                      <TextInput id="gender" v-model="form.gender" type="text" placeholder="Gender"
                        class="block w-full" autofocus autocomplete="username" />
                      <InputError :message="form.errors.gender" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-0 row">
                    <InputLabel for="address" class="col-sm-2 col-form-label" value="Address" />
                    <div class="col-sm-12">
                      <TextInput id="address" v-model="form.address" type="text" placeholder="Address"
                        class="block w-full" autofocus autocomplete="username" />
                      <InputError :message="form.errors.address" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-0 row">
                    <InputLabel for="city" class="col-sm-2 col-form-label" value="City" />
                    <div class="col-sm-12">
                      <TextInput id="city" v-model="form.city" type="text" placeholder="City"
                        class="block w-full" autofocus autocomplete="username" />
                      <InputError :message="form.errors.city" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-0 row">
                    <InputLabel for="state" class="col-sm-2 col-form-label" value="State" />
                    <div class="col-sm-12">
                      <TextInput id="state" v-model="form.state" type="text" placeholder="State"
                        class="block w-full" autofocus autocomplete="username" />
                      <InputError :message="form.errors.state" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group mb-0 row">
                    <InputLabel for="zip_code" class="col-sm-2 col-form-label" value="Zip Code" />
                    <div class="col-sm-12">
                      <TextInput id="zip_code" v-model="form.zip_code" type="text" placeholder="Zip Code"
                        class="block w-full" autofocus autocomplete="username" />
                      <InputError :message="form.errors.zip_code" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <CancelButton :routeLink="route('club.parents.index')" />
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

const props = defineProps({
  parent: {
    type: Object,
    required: true,
  },
  errors: Object,
});


const form = useForm({
  first_name: '',
  last_name: '',
  email: '',
  phone: '',
  birth_day: new Date(),
  gender: '',
  address: '',
  city: '',
  state: '',
  zip_code: '',
});

const submit = () => {

  props.errors = {};

  form.transform(data => ({
    ...data,
  })).post(route('club.parents.players.store', props.parent.id), {
    onFinish: (response) => {
      console.log(response);
    },
  });
};


</script>

<style src="@vueform/multiselect/themes/default.css"></style>
