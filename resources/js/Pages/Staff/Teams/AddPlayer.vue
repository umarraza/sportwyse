<script setup>
import { ref } from 'vue';
import { onMounted } from 'vue'

defineProps({
  team: {
    type: Object,
    required: true
  },
  players: {
    type: Object,
    required: true
  }
});

const playersArray = ref([]);

const player = ref({
  id: '',
  status: ''
});

onMounted(() => {
  playersArray.value.push(player.value);
});

const addMorePlayer = () => {
  playersArray.value.push({ id: '', status: '' });
};

const removePlayer = (index) => {
  playersArray.value.splice(index, 1);
};

</script>

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
              <i class="fas fa-minus-circle" @click="removePlayer(index)" style="font-size: 25px; color: #ff005a9c; cursor: pointer"></i>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-form-label">Select Player</label>
                <select class="form-control" v-model="item.id">
                  <option value="">(none)</option>
                  <option v-for="(player, index) in players" :key="player.id" :value="player.id">{{ player.name }}
                  </option>
                </select>
              </div>
            </div>
            <div class="col-md-5" style="padding-top: 35px !important;">
              <label class="btn btn-light">
                <input type="radio" v-model="item.status" value="Primary"> Primary
              </label>
              <label class="btn btn-light">
                <input type="radio" v-model="item.status" value="Guest"> Guest
              </label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" @click="addMorePlayer">Add More</button>
          <button type="button" class="btn btn-success" @click="addMorePlayer">Submit</button>
        </div>
      </div>
    </div>
  </div>
</template>
