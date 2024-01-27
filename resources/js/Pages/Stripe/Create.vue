<template>
  <AppLayout title="Import Stripe Data">
    <div class="row">
      <div class="col-12">
        <div class="card ">
          <div class="card-header">
            <h4 class="pl-2">Import Stripe Data</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('stripe.index')"> Back</BackToList>
            </div>
          </div>
          <div class="card-body">
            <form @submit.prevent="submit">
              <div class="form-group row">
                <div class="col-sm-10">
                  <input name="type" type="file" @change="handleFileObject" />
                </div>
              </div>
              <div class="form-group">
                <div class="">
                  <CancelButton :routeLink="route('stripe.index')" />
                  <button type="submit" class="btn btn-primary waves-effect ml-1 waves-light">Import</button>
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

const form = useForm({
  file: '',
});

const handleFileObject = (e) => {
  console.log(e, e.target, e.target.files, e.target.files[0]);
  form.file = e.target.files[0];
};

const submit = () => {
  form.transform(data => ({
    ...data,
  })).post(route('stripe.store'));
};


</script>
  
<style src="@vueform/multiselect/themes/default.css"></style>
  