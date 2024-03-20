<template>
  <AppLayout title="Camps">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="ml-4">Add Players</h4>
            <p class="mb-0">{{ team.name }}</p>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.teams.players.index', team.id)" class="btn btn-primary">
              </BackToList>
            </div>
          </div>
          <div class="card-body">
            <div class="row add-team-box mt-5" v-for="(item, index) in form.playerForms" :key="index">
              <div class="col-md-12 text-right" v-if="form.playerForms.length > 1">
                <button class="btn btn-danger" @click="removePlayerForm(index)">X</button>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-form-label">Name</label>
                  <model-select :options="playerOptions" v-model="item.id" :isError="hasError(`playerForms.${index}.id`)"
                    placeholder="Select player" @blur="onselect(index, item)">
                    <template v-slot="{ option }">
                      <span>{{ option.text }}</span>
                    </template>
                  </model-select>
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
                    <td style="width: 65% !important;" class="p0-th">{{ item.gender }}</td>
                  </tr>
                  <tr>
                    <th class="p0-th">Birth Date</th>
                    <td style="width: 65% !important;" class="p0-th">{{ formatDate(item.birth_date) }}</td>
                  </tr>
                  <tr>
                    <th class="p0-th">Parent Name</th>
                    <td style="width: 65% !important;" class="p0-th">{{ item.parent_name }}</td>
                  </tr>
                  <tr>
                    <th class="p0-th">Parent Email</th>
                    <td style="width: 65% !important;" class="p0-th">{{ item.parent_email }}</td>
                  </tr>
                  <tr>
                    <th class="p0-th">Status</th>
                    <td style="width: 65% !important;" class="p0-th">
                      <span v-if="item.status === 'Primary'" class="badge badge-success">Primary</span>
                      <span v-else class="badge badge-info">Guest</span>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12" style="padding-left: 0 !important;">
                <button type="button" class="btn btn-info" @click="addMorePlayer"><i class="fas fa-plus"></i> Add another
                  player</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-right">
                <Link :href="route('club.teams.index')" class="btn btn-secondary mr-1">
                Cancel
                </Link>
                <button type="button" class="btn btn-success" :disabled="form.processing"
                  @click.prevent="submitForm">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->
  </AppLayout>
</template>
  
<script setup>

import { ModelSelect } from 'vue-search-select'
import "vue-search-select/dist/VueSearchSelect.css"
import AppLayout from '@/Pages/Club/Layouts/AppLayout.vue';
import BackToList from "@/Pages/Slots/BackToList.vue";
import { ref } from "vue";
import { onMounted } from 'vue'
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import { useToast } from "vue-toastification";
import moment from 'moment';

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

const toast = useToast();

let submissionErrors = ref({});
let hasSubmissionErrors = ref({});

const checkDuplicatePlayer = (playerId) => {
  const playerCount = form.playerForms.filter(player => player.id === playerId).length;
  return playerCount > 1;
}

const onselect = (index, item) => {
  setTimeout(() => {

    if (item.id && checkDuplicatePlayer(item.id)) {
      toast.error("Player already added.", {
        position: "bottom-left",
      });
      item.id = '';
      return;
    }

    const selectedValue = form.playerForms[index].id;

    const player = props.players.find((player) => player.id === selectedValue);

    item.gender = player.gender;
    item.birth_date = player.birth_date;
    item.parent_name = player.user.first_name + ' ' + player.user.last_name;
    item.parent_email = player.guardian.user.email;
  }, 10);
};

const form = useForm({
  playerForms: [],
});

const playerOptions = props.players.map((player) => {
  return {
    value: player.id,
    text: player.user.name,
  }
});

const player = ref({
  id: '',
  status: 'Primary'
});

onMounted(() => {
  form.playerForms.push(player.value);
});

const hasError = (field) => {
  return hasSubmissionErrors[field] ? true : false;
};

const removePlayerForm = (index) => {
  form.playerForms.splice(index, 1);
};

const addMorePlayer = () => {
  form.playerForms.push({
    id: '',
    status: 'Primary'
  });
};

const formatDate = (date, format = 'MM-DD-YYYY') => {
  return date ? moment(date).format(format) : '-';
};

const submitForm = () => {
  form.post(route('club.teams.players.store', props.team.id), {
    onFinish: (response) => {
      // console.log(response);
    },
    onError: (error) => {

      toast.error("Validation Error: Please check your input and try again.", {
        position: "bottom-left",
      });

      let errors = error;

      for (let i in errors) {
        if (errors.hasOwnProperty(i)) {
          submissionErrors[i] = errors[i][0];
          hasSubmissionErrors[i] = true;
        }
      }
    }
  });
};

</script>
<style scope>
.p0-th {
  padding: .25rem !important;
}
</style>