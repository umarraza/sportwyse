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
          <Link :href="route('staff.dashboard')" class="sidebar-item">
            <i class="fas fa-home"></i>
            <span> Dashboard </span>
          </Link>
          <!-- <Link href="" class="sidebar-item">
            <i class="fab fa-opencart"></i>
            <span> Events </span>
          </Link> -->
          <Link :href="route('staff.teams.index')" class="sidebar-item">
            <i class="fas fa-users"></i>
            <span> Teams </span>
          </Link>
          <!-- <Link href="" class="sidebar-item">
            <i class="fas fa-user-circle"></i>
            <span> Players </span>
          </Link>
          <Link href="" class="sidebar-item">
            <i class="fas fa-user-circle"></i>
            <span> Parents </span>
          </Link> -->
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</template>
