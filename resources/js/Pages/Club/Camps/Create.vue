<template>
  <AppLayout title="Camps">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4>Crate Event</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.camps.index')">Back</BackToList>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label for="example-search-input" class="col-sm-2 col-form-label">Event Type</label>
              <div class="col-sm-10">
                <label for>
                  <input name="type" type="radio" value="Private" />
                  Private
                </label>
                <label for class="ml-2">
                  <input name="type" type="radio" value="Public" />
                  Public
                </label>
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Name" />
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Select Teams</label>
              <div class="col-sm-10">
                <Multiselect
                  v-model="value"
                  mode="tags"
                  :close-on-select="false"
                  :searchable="true"
                  :placeholder="'Select Teams'"
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
              <label for="example-search-input" class="col-sm-2 col-form-label">Select Payments</label>
              <div class="col-sm-10">
                <label for>
                  <input name="type" type="radio" value="Fixed" />
                  Fixed
                </label>
                <label for class="ml-2">
                  <input name="type" type="radio" value="Monthly" />
                  Monthly
                </label>
              </div>
            </div>
            <div class="form-group row">
              <label
                for="example-search-input"
                class="col-sm-2 col-form-label"
              >Select Processing Fee</label>
              <div class="col-sm-10">
                <label for>
                  <input name="type" type="radio" value="Exclude processing fees in price" />
                  Exclude processing fees in price
                </label>
                <label for class="ml-2">
                  <input name="type" type="radio" value="Include processing fees in price" />
                  Include processing fees in price
                </label>
                <label for class="ml-2">
                  <input name="type" type="radio" value="Show processing fees in line" />
                  Show processing fees in line
                </label>
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-sm-2 col-form-label">Price</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" placeholder="Price" />
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-4">
                <label
                  for="example-search-input"
                  class="col-form-label"
                >Processing Fees (Using Credit Card) :</label>
                <input class="form-control" type="text" placeholder readonly />
              </div>
              <div class="col-md-4">
                <label
                  for="example-search-input"
                  class="col-form-label"
                >Net Amount (Using Credit Card) :</label>
                <input class="form-control" type="text" placeholder readonly />
              </div>
              <div class="col-md-4">
                <label
                  for="example-search-input"
                  class="col-form-label"
                >Total Price (Using Credit Card) :</label>
                <input class="form-control" type="text" placeholder readonly />
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4">
                <label
                  for="example-search-input"
                  class="col-form-label"
                >Processing Fees (Using Bank Account) :</label>
                <input class="form-control" type="text" placeholder readonly />
              </div>
              <div class="col-md-4">
                <label
                  for="example-search-input"
                  class="col-form-label"
                >Net Amount (Using Bank Account) :</label>
                <input class="form-control" type="text" placeholder readonly />
              </div>
              <div class="col-md-4">
                <label
                  for="example-search-input"
                  class="col-form-label"
                >Total Price (Using Bank Account) :</label>
                <input class="form-control" type="text" placeholder readonly />
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-sm-2 col-form-label">Starting At :</label>
              <div class="col-sm-10">
                <VueDatePicker v-model="date" position="left" auto-apply />
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-sm-2 col-form-label">Ending At :</label>
              <div class="col-sm-10">
                <VueDatePicker v-model="date" position="left" auto-apply />
              </div>
            </div>
            <div class="form-group row">
              <label
                for="example-search-input"
                class="col-sm-2 col-form-label"
              >Include Cancel Button</label>
              <div class="col-sm-10">
                <div class="custom-control custom-checkbox">
                  <input
                    type="checkbox"
                    class="custom-control-input"
                    id="customCheck1"
                  />
                  <label class="custom-control-label" for="customCheck1"></label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-sm-2 col-form-label">Include Past Due</label>
              <div class="col-sm-10">
                <div class="custom-control custom-checkbox">
                  <input
                    type="checkbox"
                    class="custom-control-input"
                    id="customCheck2"
                  />
                  <label class="custom-control-label" for="customCheck2"></label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-sm-2 col-form-label">Use Credit Amount</label>
              <div class="col-sm-10">
                <div class="custom-control custom-checkbox">
                  <input
                    type="checkbox"
                    class="custom-control-input"
                    id="customCheck3"
                  />
                  <label class="custom-control-label" for="customCheck3"></label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="example-search-input" class="col-sm-2 col-form-label">Got Sport Event Id</label>
              <div class="col-sm-10">
                <input
                  name="type"
                  type="text"
                  class="form-control"
                  placeholder="Got Sport Event Id"
                />
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
</script>

<style src="@vueform/multiselect/themes/default.css"></style>
