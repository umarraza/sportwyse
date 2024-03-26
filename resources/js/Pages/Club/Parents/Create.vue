<template>
  <AppLayout title="Camps">
    <div class="row">
      <div class="col-12">
        <div class="card ">
          <div class="card-header">
            <h4 class="pl-2">Create Team</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.camps.index')"> Back</BackToList>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label for="example-search-input" class="col-sm-2 col-form-label">Gender</label>
              <div class="col-sm-10">
                <label for>
                  <input name="type" type="radio" value="Male" />
                  Male
                </label>
                <label for class="ml-2">
                  <input name="type" type="radio" value="Female" />
                  Female
                </label>
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-sm-2 col-form-label">Team Name</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Team Name" />
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Select Staff</label>
              <div class="col-sm-10">
                <Multiselect
                  v-model="value"
                  mode="tags"
                  :close-on-select="false"
                  :searchable="true"
                  :placeholder="'Select Staff'"
                  :create-option="true"
                  :options="[
                    { value: 'batman', label: 'Batman' },
                    { value: 'robin', label: 'Robin' },
                    { value: 'joker', label: 'Joker' },
                  ]"
                />
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-sm-2 col-form-label">Birth Year Start Date</label>
              <div class="col-sm-10">
                <VueDatePicker v-model="month" month-picker position="left" />
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-sm-2 col-form-label">Birth Year End Date</label>
              <div class="col-sm-10">
                <VueDatePicker v-model="month" month-picker position="left" />
              </div>
            </div>
            <div class="form-group">
              <div>
                <button type="reset" class="btn btn-secondary waves-effect">Cancel</button>
                <button type="submit" class="btn btn-primary waves-effect ml-1 waves-light">Submit</button>
              </div>
            </div>
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
import { ref } from "vue";

let value = ref();
let date = ref(new Date());
const month = ref({
  month: new Date().getMonth(),
  year: new Date().getFullYear()
});

</script>

<style src="@vueform/multiselect/themes/default.css"></style>
