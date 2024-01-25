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
          <Link :href="route('admin.dashboard')" class="sidebar-item">
            <i class="fas fa-home"></i>
            <span> Dashboard </span>
          </Link>
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</template>
