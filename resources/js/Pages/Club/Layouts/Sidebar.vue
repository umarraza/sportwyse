<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

      <!--- Sidemenu -->
      <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu" id="side-menu">
          <Link :href="route('club.dashboard')" class="sidebar-item">
            <i class="fas fa-home"></i>
            <span> Dashboard </span>
          </Link>
          <Link :href="route('club.camps.index')" class="sidebar-item">
            <i class="fab fa-opencart"></i>
            <span> Events </span>
          </Link>
          <Link :href="route('club.teams.index')" class="sidebar-item">
            <i class="fas fa-users"></i>
            <span> Teams </span>
          </Link>
          <Link :href="route('club.parents.index')" class="sidebar-item">
            <i class="fas fa-user-circle"></i>
            <span> Parents </span>
          </Link>
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</template>
