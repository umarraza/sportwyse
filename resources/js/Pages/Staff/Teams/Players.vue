<template>
  <div class="modal fade" :class="`staffMembersModal${team.id}`" tabindex="-1" role="dialog"
    :aria-labelledby="`staffMembersModal${team.id}`" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0" :id="`staffMembersModal${team.id}`">Players</h5>
          <button type="button" class="modal-close-btn close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive b-0" data-pattern="priority-columns" v-if="team.players.length">
            <table class="table">
              <tr>
                <th><b>Name</b></th>
                <th><b>Status</b></th>
                <th><b>Action</b></th>
              </tr>
              <tr v-for="(player, index) in team.players" :key="index">
                <td>{{ `${player.user.first_name} ${player.user.last_name}` }}</td>
                <td><span :class="['badge', player.pivot.status === 'Primary' ? 'badge-success' : 'badge-info']">{{
                  player.pivot.status }}</span></td>
                <td>
                  <button class="btn btn-danger btn-xs" @click="deletePlayer(player)"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            </table>
          </div>
          <div v-else class="text-center">No players found!</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
import { ref } from 'vue';

const props = defineProps({
  team: {
    type: Object,
    required: true
  }
});

const deletePlayer = (player) => {
  if (confirm('Are you sure you want to delete this player?')) {
    router.delete(`/staff/teams/${props.team.id}/players/${player.id}`, {
      onSuccess: () => {
        document.querySelector(`.staffMembersModal${props.team.id} .close`).click();
      },
    });
  }
}


</script>