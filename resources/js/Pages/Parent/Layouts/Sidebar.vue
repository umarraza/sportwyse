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
          <li class="menu-title">Menu</li>
          <Link href="" class="sidebar-item">
            <i class="fab fa-opencart"></i>
            <span> My Clubs </span>
          </Link>
          <li>
            <a href="index.html" class="waves-effect">
              <i class="fas fa-user-circle"></i>
              <span> Players </span>
            </a>
          </li>
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</template>
