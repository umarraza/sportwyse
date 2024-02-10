<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
  <div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">
      <div id="sidebar-menu">
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
          <Link :href="route('club.players.index')" class="sidebar-item">
          <i class="fas fa-user-friends"></i>
          <span> Players </span>
          </Link>
          <Link :href="route('club.parents.index')" class="sidebar-item">
          <i class="fas fa-user-circle"></i>
          <span> Parents </span>
          </Link>
          <Link :href="route('stripe.index')" class="sidebar-item">
          <i class="fab fa-stripe-s"></i>
          <span> Stripe </span>
          </Link>
          <Link :href="route('transactions.index')" class="sidebar-item">
          <i class="fab fa-stripe-s"></i>
          <span> Transactions </span>
          </Link>
          
          <!-- <Link :href="route('model-select')" class="sidebar-item">
          <i class="fab fa-stripe-s"></i>
          <span> Model Select </span>
          </Link> -->
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</template>
