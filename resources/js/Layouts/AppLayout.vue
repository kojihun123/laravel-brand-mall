<script setup>
import Footer from '@/Components/Layout/Footer.vue';
import Header from '@/Components/Layout/Header.vue';
</script>

<template>
  <div class="min-h-screen flex flex-col bg-gray-100">
    <Header />

    <main class="flex-1">
      <div class="mx-auto w-full max-w-7xl px-4 py-6 md:py-8">
        <slot />
      </div>
    </main>

    <Footer />
  </div> 
</template>
