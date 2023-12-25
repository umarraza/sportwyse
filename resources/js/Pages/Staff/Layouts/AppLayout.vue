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

  <div class="content-page" style="height: ;">
    <div class="content">
      <div class="container-fluid pt-5">
        <main>
          <slot />
        </main>
      </div>
    </div>
  </div>
</template>
