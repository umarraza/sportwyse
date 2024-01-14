<template>
  <AppLayout title="Camps">
    <SuccessAlert v-if="$page.props.flash.success" :message="$page.props.flash.success" />
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="pl-4">Add Players</h4>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.teams.index')" class="btn btn-primary"></BackToList>
            </div>
          </div>
          <div class="card-body">
            <div class="row add-team-box mt-5" v-for="(item, index) in playersArray" :key="index">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Name</label>
                  <VueMultiselect v-model="item.id" @Select="checkDuplicate(item)" :options="allPlayers"
                    :close-on-select="true" :clear-on-select="false" placeholder="Select one" label="name"
                    track-by="name" />
                  <div class="txt-danger">
                    {{ errors[`players.${index}.id`] }}
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Status</label>
                  <select class="custom-select" v-model="item.status">
                    <option value="Primary">Primary</option>
                    <option value="Guest">Guest</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <table class="table table-xs">
                  <tr>
                    <th class="p0-th">Gender</th>
                    <td class="p0-th">{{ item.id.gender }}</td>
                  </tr>
                  <tr>
                    <th class="p0-th">Parent Name</th>
                    <td class="p0-th">{{ item.id.parent_name }}</td>
                  </tr>
                  <tr>
                    <th class="p0-th">Parent Email</th>
                    <td class="p0-th">{{ item.id.parent_email }}</td>
                  </tr>
                  <tr>
                    <th class="p0-th">Status</th>
                    <td class="p0-th">
                      <span v-if="item.status === 'Primary'" class="badge badge-success">Primary</span>
                      <span v-else class="badge badge-info">Guest</span>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12" style="padding-left: 0 !important;">
                <button type="button" class="btn btn-outline-info waves-effect waves-light" @click="addMorePlayer"><i
                    class="fas fa-plus"></i> Add another player</button>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-md-12 text-right">
                <Link :href="route('club.teams.index')" class="btn btn-secondary mr-1">
                Cancel
                </Link>
                <button type="button" class="btn btn-primary mr-1" @click="addMorePlayer">Add More</button>
                <button type="button" class="btn btn-success" @click.prevent="submitForm">Submit</button>
              </div>
            </div> -->
          </div>
        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->
  </AppLayout>
</template>
  
<script setup>

import AppLayout from '@/Pages/Club/Layouts/AppLayout.vue';
import BackToList from "@/Pages/Slots/BackToList.vue";
import { ref } from "vue";
import VueMultiselect from 'vue-multiselect'
import { onMounted } from 'vue'
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';


const props = defineProps({
  players: {
    type: Object,
    required: true
  },
  team: {
    type: Object,
    required: true
  },
  errors: {
    type: Object,
    required: false
  }
});

let playersArray = ref([]).value;

const allPlayers = props.players.map((player) => {
  return {
    id: player.id,
    name: player.user.name,
    gender: player.gender,
    parent_email: player.guardian.user.email,
    parent_name: player.guardian.user.first_name + ' ' + player.guardian.user.last_name,
  }
});

const player = ref({
  id: '',
  status: 'Primary'
});

onMounted(() => {
  playersArray.push(player.value);
});

const addMorePlayer = () => {
  playersArray.push({ id: '', status: 'Primary' });
};

const removePlayer = (index) => {
  if (playersArray.length === 1) {
    alert('Atleast one player is required!');
    return;
  }
  playersArray.splice(index, 1);
};

const checkDuplicate = (value) => {
  const duplicate = playersArray.filter((player) => player.id === value.id);
  if (duplicate.length > 1) {
    alert('Duplicate player selected!');
    playersArray.pop();
  }
};

const form = useForm({
  players: playersArray.map((player) => ({
    id: player.id.id,
    status: player.status,
  })),
});

const submitForm = () => {

  props.errors = {};

  form.transform(data => ({
    ...data,
  })).post(route('club.teams.players.store', props.team.id), {
    onFinish: (response) => {
      console.log(response);
    },
  });
};

</script>

<style scope>
.p0-th {
  padding: .25rem !important;
}
</style>