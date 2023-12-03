<script setup>
import Banner from '@/Components/Banner.vue';
import Sidebar from './Sidebar.vue';
import Header from './Header.vue';

defineProps({
  title: String,
});

</script>
<template>

    <Head :title="title" />

    <Banner />

    <Header />

    <Sidebar />

    <main>
      <slot />
    </main>
</template>
