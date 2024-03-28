<template>
  <AppLayout title="Camps">
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title mt-0" id="mySmallModalLabel">Create New Player</h5>
            <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="submitPlayer">
              <div class="form-group row">
                <InputLabel for="first_name" class="col-sm-2 col-form-label" value="First Name" />
                <div class="col-sm-10">
                  <TextInput id="first_name" v-model="playerForm.first_name" type="text" class="mt-1 block w-full"
                    autofocus autocomplete="first_name" />
                  <InputError class="mt-2" :message="form.errors.first_name" />
                </div>
              </div>
              <div class="form-group row">
                <InputLabel for="last_name" class="col-sm-2 col-form-label" value="First Name" />
                <div class="col-sm-10">
                  <TextInput id="last_name" v-model="playerForm.last_name" type="text" class="mt-1 block w-full"
                    autofocus autocomplete="last_name" />
                  <InputError class="mt-2" :message="form.errors.last_name" />
                </div>
              </div>
              <div class="form-group row">
                <InputLabel for="email" class="col-sm-2 col-form-label" value="Email" />
                <div class="col-sm-10">
                  <TextInput id="email" v-model="playerForm.email" type="email" class="mt-1 block w-full" autofocus
                    autocomplete="email" />
                  <InputError class="mt-2" :message="form.errors.email" />
                </div>
              </div>
              <div class="form-group row">
                <InputLabel for="gender" class="col-sm-2 col-form-label" value="Gender" />
                <div class="col-sm-10">
                  <select class="form-control" v-model="playerForm.gender">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  <InputError :message="form.errors.gender" />
                </div>
              </div>
              <div class="form-group row">
                <InputLabel for="status" class="col-sm-2 col-form-label" value="Status" />
                <div class="col-sm-10">
                  <select class="form-control" v-model="playerForm.status">
                    <option value="">Select Status</option>
                    <option value="Primary">Primary</option>
                    <option value="Guest">Guest</option>
                  </select>
                  <InputError :message="form.errors.status" />
                </div>
              </div>
              <div class="form-group row">
                <label for="example-search-input" class="col-sm-2 col-form-label">Birth Date</label>
                <div class="col-sm-10">
                  <VueDatePicker position="left" :enable-time-picker="false" v-model="playerForm.birth_date"
                    auto-apply />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Select Parent</label>
                <div class="col-sm-10">
                  <model-select :options="guardiansOptions" v-model="playerForm.guardian_id"
                    placeholder="Select Parent">
                  </model-select>
                  <InputError class="mt-2" :message="form.errors.guardian_id" />
                </div>
              </div>
              <div class="form-group">
                <div>
                  <button type="submit" class="btn btn-primary waves-effect ml-1 waves-light">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="ml-4">Add Players</h4>
            <p class="mb-0">{{ team.name }}</p>
            <div class="card-header-right">
              <button type="button" class="btn btn-success waves-effect waves-light mr-1" data-toggle="modal"
                data-target=".bs-example-modal-sm"><i class="fa fa-plus"></i> Create New Player</button>
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
                  <model-select :options="playerOptions" v-model="item.id"
                    :isError="hasError(`playerForms.${index}.id`)" placeholder="Select player"
                    @blur="onselect(index, item)">
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
                <button type="button" class="btn btn-info" @click="addMorePlayer"><i class="fas fa-plus"></i> Add
                  another
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
import { router } from '@inertiajs/vue3';

const props = defineProps({
  players: {
    type: Object,
    required: true
  },
  team: {
    type: Object,
    required: true
  },
  guardians: {
    type: Object,
    required: true
  },
  errors: {
    type: Object,
    required: false
  }
});

const guardiansOptions = props.guardians.map((parent) => {
  return {
    value: parent.id,
    text: parent.user.first_name + ' ' + parent.user.last_name,
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

const playerForm = useForm({
  first_name: '',
  last_name: '',
  birth_date: new Date(),
  gender: '',
  email: '',
  guardian_id: '',
  team_id: props.team.id,
  status: 'Primary',
  redirectUrl:  route('club.teams.players.index', props.team.id),
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

const submitPlayer = () => {

  props.errors = {};

  playerForm.transform(data => ({
    ...data,
  })).post(route('club.players.store'), {
    onFinish: () => {
    },
  });

  document.querySelector('.modal-close-btn').click();
};

</script>
<style scope>
.p0-th {
  padding: .25rem !important;
}
</style>