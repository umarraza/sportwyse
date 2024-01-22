<template>
  <AppLayout title="Camps">
    <form class="form theme-form">
      <div class="row">
        <div class="col-12">
          <div class="card ">
            <div class="card-header">
              <h4 class="pl-2">Add Players</h4>
              <h6 class="card-subtitle font-14 pl-2 text-muted">{{ team.name }}</h6>
              <div class="card-header-right">
                <BackToList :backToListRoute="route('club.camps.index')"> Back</BackToList>
              </div>
            </div>
            <div class="card-body">
              <div class="row" v-for="(item, index) in playersArray" :key="index">
                <div class="col-md-1" style="padding: 38px 0px 0px 15px !important;">
                  <i class="fas fa-minus-circle" @click="removePlayer(index)"
                    style="font-size: 25px; color: #ff005a9c; cursor: pointer"></i>
                </div>

                <div class="col-md-5">
                  <div class="form-group">
                    <label class="col-form-label">Name</label>
                    <VueMultiselect v-model="item.id" :options="allPlayers" :close-on-select="true"
                      :clear-on-select="false" placeholder="Select one" label="name" track-by="name" />
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
            <div class="card-footer text-right">
              <Link :href="route('staff.teams.index')" class="btn btn-light">
              Cancel
              </Link>
              <button type="button" class="btn btn-primary ml-1" @click="addMorePlayer">Add More</button>
              <button type="button" class="btn btn-success ml-1" @click="submitForm">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </AppLayout>
</template>

<script>
import AppLayout from "@/Pages/Staff/Layouts/AppLayout.vue";
import BackToList from "@/Pages/Slots/BackToList.vue";
import { ref } from "vue";
import VueMultiselect from 'vue-multiselect'
import { onMounted } from 'vue'
import { Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'

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
        router.post(route('staff.teams.add-player', props.team.id), {
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
</script>