<template>
  <AppLayout title="Players">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-30">
          <div class="card-header">
            <h4 class="ml-4">Players</h4>
            <p class="mb-0">{{ team.name }}</p>
            <div class="card-header-right">
              <BackToList :backToListRoute="route('club.teams.index')"> Back</BackToList>
              <AddButton :routeLink="route('club.teams.players.add', team.id)" class="btn btn-success ml-1"> Add Players
              </AddButton>
            </div>
          </div>
          <div class="card-body">
            <div class="table-rep-plugin">
              <div class="table-responsive b-0" data-pattern="priority-columns">
                <table id="tech-companies-1" class="table table-striped">
                  <thead>
                    <tr>
                      <th>Photo</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Birth Date</th>
                      <th>Status</th>
                      <th>Parent Name</th>
                      <th>Parent Email</th>
                      <th>Parent Phone</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(player, index) in players" :key="index">
                      <td>-</td>
                      <td>
                        <Link :href="route('club.players.show', player.id)">
                        {{ player.user.first_name }}
                        </Link>
                      </td>
                      <td>{{ player.user.last_name }}</td>
                      <td>{{ formatDate(player.birth_date) }}</td>
                      <td>

                        <button :class="['btn', player.pivot.status === 'Primary' ? 'btn-success' : 'btn-info']"
                          @click="changeStatus(player)">{{ player.pivot.status }}</button>


                      </td>
                      <td>{{ `${player.guardian.user.first_name} ${player.guardian.user.last_name}` }}</td>
                      <td><a :href="`mailto:${player.guardian.user.email}`">{{ player.guardian.user.email }}</a></td>
                      <td>{{ player.guardian.phone }}</td>
                      <td>
                        <div class="btn-group btn-group-sm ml-auto menu-actions align-self-center">
                          <button class="btn btn-danger" @click="deletePlyaer(player.id)">Remove</button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- end col -->
    </div> <!-- end row -->
  </AppLayout>
</template>

<script setup>

import AppLayout from '@/Pages/Club/Layouts/AppLayout.vue';
import BackToList from "@/Pages/Slots/BackToList.vue";
import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import moment from 'moment';

const props = defineProps({
  players: {
    type: Object,
    required: true
  },
  team: {
    type: Object,
    required: true
  }
});

const formatDate = (date, format = 'MM-DD-YYYY') => {
  return date ? moment(date).format(format) : '-';
};

const changeStatus = (player) => {
  const status = player.pivot.status === 'Primary' ? 'Guest' : 'Primary';
  const data = {
    status: status,
    redirect_url: route('club.teams.players.index', props.team.id)
  };
  if (confirm('Are you sure you want to update the status?')) {
    router.post(route('club.players.teams.update-status', [player.id, props.team.id]), data);
  }
};

const deletePlyaer = (playerId) => {
  if (confirm('Are you sure you want to remove this player from the team?')) {
    router.delete(route('club.teams.players.delete', [props.team.id, playerId]), {
      onSuccess: () => {
      },
    });
  }
};

</script>