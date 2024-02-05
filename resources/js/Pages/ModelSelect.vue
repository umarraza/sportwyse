<script setup>
import Welcome from '@/Components/Welcome.vue';
import { Link } from '@inertiajs/vue3';
import { ModelSelect } from "vue-search-select"
import "vue-search-select/dist/VueSearchSelect.css"
import { watch, ref } from 'vue';
import AppLayout from "@/Pages/Club/Layouts/AppLayout.vue";

const options = ref([
  { value: "1", text: "aa" + " - " + "1" },
  { value: "2", text: "ab" + " - " + "2" },
  { value: "3", text: "bc" + " - " + "3" },
  { value: "4", text: "cd" + " - " + "4" },
  { value: "5", text: "de" + " - " + "5" },
  { value: "6", text: "ef" + " - " + "6" },
  { value: "10", text: "ef" + " - " + "10" },
  { value: "11", text: "ef" + " - " + "11" },
  { value: "12", text: "ef" + " - " + "12" },
  { value: "13", text: "down case" + " - " + "testcase" },
  { value: "14", text: "camel case" + " - " + "testCase" },
  { value: "15", text: "Capitalize case" + " - " + "Testcase" },
  { value: "16", text: "more a" + " - " + "1" },
  { value: "17", text: "more a" + " - " + "2" },
  { value: "18", text: "more a" + " - " + "3" },
  { value: "19", text: "more a" + " - " + "4" },
  { value: "20", text: "more a" + " - " + "5" },
  { value: "21", text: "more a" + " - " + "6" },
  { value: "22", text: "more a" + " - " + "7" },
  { value: "23", text: "more a" + " - " + "8" },
  { value: "24", text: "more a" + " - " + "9" },
]);

const item = ref('');

const reset = () => {
  item.value = ""
};

const selectOption = () => {
  item.value = options.value[0].value
};


const handleOnInput = ($event) => {
  console.log($event);
  item.value = $event
};


</script>

<template>
  <AppLayout title="Dashboard">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
          </div>
          <div class="card-body">
            <div class="ui vertical segment">
              <div class="flexbox">
                <div class="flex-content">
                  <h3>Handling Event sample</h3>
                  <div class="button-group">
                    <button type="button" @click="reset" class="small ui button">reset</button>
                    <button type="button" @click="selectOption" class="small ui button">option select from parent</button>
                  </div>
                  <div>
                    <model-select :options="options" v-model="item" @change="handleOnInput" placeholder="placeholder text">
                    </model-select>
                  </div>
                </div>
                <div class="flex-result">
                  <table class="ui celled table">
                    <thead>
                      <tr>
                        <th>value</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ item }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
