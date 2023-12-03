<script setup>
import DropdownLink from '@/Components/DropdownLink.vue';
import { router } from '@inertiajs/vue3';

const toggleSidebar = () => {
  document.body.classList.toggle("enlarged");
};
const logout = () => {
  router.post(route('logout'));
};
</script>

<template>
  <div class="topbar">
    <div class="topbar-left">

      <a href="index.html" class="logo">

        <span class="logo-light">
          <i class="mdi mdi-camera-control"></i> SportWyse
        </span>
        <span class="logo-sm">
          <i class="mdi mdi-camera-control"></i>
        </span>

      </a>
    </div>
    <nav class="navbar-custom">
      <ul class="navbar-right list-inline float-right mb-0">
        <!-- notification -->
        <li class="dropdown notification-list list-inline-item">
          <h5>Welcome {{ $page.props.auth.user.club.name }}</h5>
        </li>

        <li class="dropdown notification-list list-inline-item">
          <div class="dropdown notification-list nav-pro-img">
            <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button"
              aria-haspopup="false" aria-expanded="false">
              <img src="/assets/images/users/user-4.jpg" alt="user" class="rounded-circle" style="margin-top:10px">
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
              <!-- item-->
              <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Profile</a>
              <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i
                  class="mdi mdi-settings"></i> Settings</a>
              <div class="dropdown-divider"></div>
              <form @submit.prevent="logout">
                <DropdownLink as="button">
                  Log Out
                </DropdownLink>
                <!-- <a class="dropdown-item text-danger" href="#" type="submit"><i class="mdi mdi-power text-danger"></i> Logout</a> -->
              </form>

            </div>
          </div>
        </li>
      </ul>
      <ul class="list-inline menu-left mb-0">
        <li class="float-left">
          <button class="button-menu-mobile open-left waves-effect" @click="toggleSidebar">
            <i class="mdi mdi-menu"></i>
          </button>
        </li>
      </ul>
    </nav>
  </div>
</template>
