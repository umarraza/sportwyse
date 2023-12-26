<script setup>
import { Head } from '@inertiajs/vue3';
import Banner from '@/Components/Banner.vue';
import Sidebar from "@/Pages/Staff/Layouts/Sidebar.vue";
import Header from "@/Pages/Staff/Layouts/Header.vue";

defineProps({
  title: String,
});

</script>
<template>
  <div>
    <Head :title="title" />

    <Banner />

    <Header />

    <Sidebar />

    <div class="content-page">
      <div class="content">
        <div class="container-fluid pt-5">
          <main>
            <slot />
          </main>
        </div>
      </div>
    </div>
  </div>
</template>
