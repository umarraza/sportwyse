<template>
  <div class="modal fade" :class="`addPlayers${team.id}`" tabindex="-1" role="dialog"
    :aria-labelledby="`addPlayers${team.id}Label`" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0" :id="`addPlayers${team.id}Label`">Add Players</h5>
          <button type="button" class="modal-close-btn close" data-dismiss="modal" aria-label="Close">
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
                <VueMultiselect v-model="item.id" @Select="checkDuplicate(item)" :options="allPlayers" :close-on-select="true" :clear-on-select="false"
                  placeholder="Select one" label="name" track-by="name" />
                <div class="txt-danger">
                  {{ errors[`players.${index}.id`] }}
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

<script setup>
import { ref } from "vue";
import VueMultiselect from 'vue-multiselect'
import { onMounted } from 'vue'
import { router } from '@inertiajs/vue3'

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

let playersArray = ref([]).value;

const allPlayers = props.players.map((player) => {
  return {
    id: player.id,
    name: player.name,
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

const submitForm = () => {

  router.post(route('staff.teams.add-player', props.team.id), {
    players: playersArray.map((player) => ({
      id: player.id.id,
      status: player.status,
    })),
  }, {
    onSuccess: () => {
      document.querySelector('.modal-close-btn').click();
    },
  });
};

</script>