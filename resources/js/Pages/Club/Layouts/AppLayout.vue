<script setup>
import { Head } from '@inertiajs/vue3';
import Banner from '@/Components/Banner.vue';
import Sidebar from "@/Pages/Club/Layouts/Sidebar.vue";
import Header from "@/Pages/Club/Layouts/Header.vue";

defineProps({
  title: String,
});

</script>
<template>
  <Head :title="title" />

  <Banner />

  <Header />

  <Sidebar />

  <div class="content-page">
    <div class="content">
      <div class="container-fluid pt-5">
        <!-- <div class="page-title-box">
          <div class="row align-items-center">
            <div class="col-sm-6">
              <h4 class="page-title">Responsive Table</h4>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-right">
                <Link class="breadcrumb-item" :href="route('club.dashboard')">
                  Dashboard
                </Link>
                <Link class="breadcrumb-item" :href="route('club.camps.index')">
                  Events
                </Link>
              </ol>
            </div>
          </div> 
        </div> -->
        <main>
          <slot />
        </main>
      </div>
    </div>
  </div>
</template>
