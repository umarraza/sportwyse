<template>
  <AppLayout title="Player Details">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-2">Player Details</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.players.index')" class="mr-1"> Back</BackToList>
            </div>
          </div>
          <div class="card-body">
            <table class="table">
              <tr>
                <th>First Name</th>
                <td>{{ player.user.first_name }}</td>
              </tr>
              <tr>
                <th>Last Name</th>
                <td>{{ player.user.last_name }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{{ player.user.email }}</td>
              </tr>
              <tr>
                <th>Parent Phone</th>
                <td>{{ player.user.last_name }}</td>
              </tr>
              <tr>
                <th>Parent Email</th>
                <td><a :href="`mailto:${player.guardian.user.email}`">{{ player.guardian.user.email }}</a></td>
              </tr>
              <tr>
                <th>Phone</th>
                <td>{{ player.phone }}</td>
              </tr>
              <tr>
                <th>Date Of Birth</th>
                <td>{{ player.birth_date }}</td>
              </tr>
              <tr>
                <th>Gender</th>
                <td>{{ player.gender }}</td>
              </tr>
              <tr>
                <th>Address</th>
                <td>{{ player.address }}</td>
              </tr>
              <tr>
                <th>State</th>
                <td>{{ player.state }}</td>
              </tr>
              <tr>
                <th>City</th>
                <td>{{ player.city }}</td>
              </tr>
              <tr>
                <th>Zip Code</th>
                <td>{{ player.zip_code }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-12">
        <ul class="nav nav-tabs" id="ex-with-icons" role="tablist">
          <li class="nav-item" role="presentation" v-for="(tab, index) in tabs" :key="index">
            <a data-mdb-tab-init class="nav-link" :class="{ 'active': currentTab === tab.component }" href="#" role="tab"
              aria-controls="ex-with-icons-tabs-1" aria-selected="true" @click="changeTab(tab)"><i
                :class="['fa-fw me-2', tab.icon]"></i>{{ tab.title
                }}</a>
          </li>
        </ul>
        <div class="tab-content" id="ex-with-icons-content">
          <div>
            <keep-alive>
              <component :is="currentTab" :player="player" />
            </keep-alive>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
  
<script setup>
import AppLayout from "@/Pages/Club/Layouts/AppLayout.vue";
import BackToList from "@/Pages/Slots/BackToList.vue";
import FamilyDetails from "@/Pages/Club/Players/Includes/FamilyDetails.vue";
import Transactions from "@/Pages/Club/Players/Includes/Transactions/Index.vue";
import { defineProps, shallowRef, provide } from "vue";

const props = defineProps({
  player: {
    type: Object,
    required: true,
  },
  campsOptions: {
    type: Array,
    required: true,
  },
});

const tabs = [
  {
    title: "Family Details",
    name: "FamilyDetails",
    component: FamilyDetails,
    icon: 'fas fa-user-friends'
  },
  {
    title: "Transactions",
    name: "Transactions",
    component: Transactions,
    icon: 'fas fa-money-check-alt'
  },
];

const currentTab = shallowRef(FamilyDetails);

const changeTab = (tab) => {
  currentTab.value = tab.component;
};

provide('campsOptions', props.campsOptions)

</script>