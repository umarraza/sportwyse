<script setup>
defineProps({
    team: {
      type: Object,
      required: true
    }
});
</script>
<template>
  <div class="modal fade" :class="`staffMembersModal${team.id}`" tabindex="-1" role="dialog"
    :aria-labelledby="`staffMembersModal${team.id}`" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-0" :id="`staffMembersModal${team.id}`">Players</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive b-0" data-pattern="priority-columns">

            <ul v-if="team.players.length">
              <li v-for="(player, index) in team.players" :key="index">{{ `${player.user.first_name}
                              ${player.user.last_name}` }}</li>
            </ul>
            <p v-else>No player found.</p>

            <!-- <table id="teams-table" class="table">
                                  <thead>
                                    <tr>
                                      <th><strong>Staff Name</strong></th>
                                      <th><strong>Email</strong></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr v-for="(staff, index) in team.players" :key="index">
                                      <td>{{ `${staff.user.first_name} ${staff.user.last_name}` }}</td>
                                      <td>{{ staff.user.email }}</td>
                                    </tr>
                                  </tbody>
                                </table> -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>