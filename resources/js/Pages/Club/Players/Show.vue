<template>
    <AppLayout title="Player Details">
      <div class="row">
        <div class="col-12">
          <div class="card m-b-30">
            <div class="card-header">
              <h4 class="pl-2">Player Details</h4>
              <div class="card-header-right">
                <BackToList :backToListRoute="route('club.players.index')" class="mr-1"> Back</BackToList>
              </div>
            </div>
            <div class="card-body">
              <table class="table">
                <tr>
                  <th>First Name</th>
                  <td>{{ player.user.first_name }}</td>
                </tr>
                <tr>
                  <th>Last Name</th>
                  <td>{{ player.user.last_name }}</td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>{{ player.user.email }}</td>
                </tr>
                <tr>
                  <th>Parent Phone</th>
                  <td>{{ player.user.last_name }}</td>
                </tr>
                <tr>
                  <th>Parent Email</th>
                  <td><a :href="`mailto:${player.guardian.user.email}`">{{ player.guardian.user.email }}</a></td>
                </tr>
                <tr>
                  <th>Phone</th>
                  <td>{{ player.phone }}</td>
                </tr>
                <tr>
                  <th>Date Of Birth</th>
                  <td>{{ player.birth_date }}</td>
                </tr>
                <tr>
                  <th>Gender</th>
                  <td>{{ player.gender }}</td>
                </tr>
                <tr>
                  <th>Address</th>
                  <td>{{ player.address }}</td>
                </tr>
                <tr>
                  <th>State</th>
                  <td>{{ player.state }}</td>
                </tr>
                <tr>
                  <th>City</th>
                  <td>{{ player.city }}</td>
                </tr>
                <tr>
                  <th>Zip Code</th>
                  <td>{{ player.zip_code }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-12">
          <div class="card m-b-30">
            <div class="card-header">
              <h4 class="pl-2">Family Details</h4>
            </div>
            <div class="card-body">
              <table class="table">
                <tr>
                  <th>Parent Name</th>
                  <td>
                    {{ player.guardian.user.first_name }} {{ player.guardian.user.last_name }}
                  </td>
                </tr>
                <tr>
                  <th>Relationship With Child</th>
                  <td>{{ player.guardian.relationship_with_child }}</td>
                </tr>
                <tr>
                  <th>Parent Phone</th>
                  <td>{{ player.guardian.phone }}</td>
                </tr>
                <tr>
                  <th>Parent Email</th>
                  <td><a :href="`mailto:${player.guardian.user.email}`">{{ player.guardian.user.email }}</a></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </AppLayout>
  </template>
  
  <script setup>
  import AppLayout from "@/Pages/Club/Layouts/AppLayout.vue";
  import EditButton from "@/Pages/Slots/EditButton.vue";
  import BackToList from "@/Pages/Slots/BackToList.vue";
  
  const props = defineProps({
    player: {
      type: Object,
      required: true,
    }
  });
  </script>