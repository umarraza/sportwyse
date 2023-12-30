<template>
  <div class="modal fade" :class="`addPlayers${team.id}`" tabindex="-1" role="dialog"
    :aria-labelledby="`addPlayers${team.id}Label`" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0" :id="`addPlayers${team.id}Label`">Add Players</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row" v-for="(item, index) in playersArray" :key="index">
            <div class="col-md-1" style="padding: 38px 0px 0px 15px !important;">
              <i class="fas fa-minus-circle" @click="removePlayer(index)"
                style="font-size: 25px; color: #ff005a9c; cursor: pointer"></i>
            </div>

            <div class="col-md-5">
              <div class="form-group">
                <label class="col-form-label">Name</label>
                <VueMultiselect v-model="item.id" :options="allPlayers" :close-on-select="true" :clear-on-select="false"
                  placeholder="Select one" label="name" track-by="name" />
                <div class="txt-danger">
                  This value is required
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label class="col-form-label">Status</label>
                <select class="custom-select" v-model="item.status">
                  <option value="Primary">Primary</option>
                  <option value="Guest">Guest</option>
                </select>
                <div class="txt-danger">
                  This value is required
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" @click="addMorePlayer">Add More</button>
          <button type="button" class="btn btn-success" @click.prevent="submitForm">Submit</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AppLayout from "@/Pages/Staff/Layouts/AppLayout.vue";
import BackToList from "@/Pages/Slots/BackToList.vue";
import { ref } from "vue";
import VueMultiselect from 'vue-multiselect'
import { onMounted } from 'vue'
import { Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia'

export default {
  components: {
    AppLayout,
    BackToList,
    VueMultiselect,
    Link
  },
  props: {
    team: {
      type: Object,
      required: true
    },
    players: {
      type: Object,
      required: true
    },
    errors: {
      type: Object,
      required: false
    }
  },
  setup(props) {

    const playersArray = ref([]).value;

    let value = ref('');

    const allPlayers = props.players.map((player) => {
      return {
        id: player.id,
        name: player.name,
      }
    });

    const options = ref([
      { name: 'Vue.js', language: 'JavaScript' },
      { name: 'AdonisJs', language: 'JavaScript' },
      { name: 'Rails', language: 'Ruby' },
      { name: 'Sinatra', language: 'Ruby' },
      { name: 'Laravel', language: 'PHP' },
      { name: 'Phoenix', language: 'Elixir' }
    ]);

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
      playersArray.splice(index, 1);
    };

    const submitForm = async () => {
      try {
        Inertia.post(route('staff.teams.add-player', props.team.id), {
          players: playersArray,
        });
      } catch (error) {
        alert(error);
      }
    };

    return {
      playersArray,
      allPlayers,
      options,
      player,
      addMorePlayer,
      removePlayer,
      submitForm,
    }
  },
};


// const props = defineProps({
//   team: {
//     type: Object,
//     required: true
//   },
//   players: {
//     type: Object,
//     required: true
//   },
//   errors: {
//     type: Object,
//     required: false
//   }
// });

// const playersArray = ref([]).value;

// let value = ref('');


// const allPlayers = props.players.map((player) => {
//   return {
//     id: player.id,
//     name: player.name,
//   }
// });

// const options = ref([
//   { name: 'Vue.js', language: 'JavaScript' },
//   { name: 'AdonisJs', language: 'JavaScript' },
//   { name: 'Rails', language: 'Ruby' },
//   { name: 'Sinatra', language: 'Ruby' },
//   { name: 'Laravel', language: 'PHP' },
//   { name: 'Phoenix', language: 'Elixir' }
// ]);

// const player = ref({
//   id: '',
//   status: 'Primary'
// });

// onMounted(() => {
//   playersArray.push(player.value);
// });

// const addMorePlayer = () => {
//   playersArray.push({ id: '', status: 'Primary' });
// };

// const removePlayer = (index) => {
//   playersArray.splice(index, 1);
// };

// const submitForm = async () => {
//   try {
//     Inertia.post(route('staff.teams.add-player', props.team.id), {
//       players: playersArray,
//     });
//   } catch (error) {
//     alert(error);
//   }
// };
</script>


<!-- <script setup>
import { ref } from 'vue';
import { onMounted } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import VueMultiselect from 'vue-multiselect'

const props = defineProps({
  team: {
    type: Object,
    required: true
  },
  players: {
    type: Object,
    required: true
  },
  errors: {
    type: Object,
    required: false
  }
});

const playersArray = ref([]).value;

let value = ref('');


const allPlayers = props.players.map((player) => {
  return {
    id: player.id,
    name: player.name,
  }
});

const options = ref([
  { name: 'Vue.js', language: 'JavaScript' },
  { name: 'AdonisJs', language: 'JavaScript' },
  { name: 'Rails', language: 'Ruby' },
  { name: 'Sinatra', language: 'Ruby' },
  { name: 'Laravel', language: 'PHP' },
  { name: 'Phoenix', language: 'Elixir' }
]);

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
  playersArray.splice(index, 1);
};

const submitForm = async () => {
  try {
    Inertia.post(route('staff.teams.add-player', props.team.id), {
      players: playersArray,
    });
  } catch (error) {
    console.log(error);
  }
};

</script> -->