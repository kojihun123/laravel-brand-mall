<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
  <AppLayout>
    <section class="overflow-hidden rounded-3xl bg-gradient-to-r from-gray-900 via-gray-800 to-gray-700 px-6 py-12 text-white md:px-10 md:py-16">
      <p class="text-sm font-semibold uppercase tracking-[0.24em] text-gray-300">
        Laravel Brand Mall
      </p>
      <div class="mt-4 max-w-3xl">
        <h1 class="text-4xl font-bold tracking-tight md:text-5xl">
          Everyday style, curated for a simple modern storefront.
        </h1>
        <p class="mt-4 text-base leading-7 text-gray-300 md:text-lg">
          Explore sneakers, apparel, accessories, and seasonal picks in a clean demo shopping experience built with Laravel, Inertia, and Vue.
        </p>
      </div>
      <div class="mt-8 flex flex-wrap gap-3">
        <a
          href="/products"
          class="rounded-xl bg-white px-5 py-3 text-sm font-semibold text-gray-900 transition hover:bg-gray-100"
        >
          Shop Products
        </a>
        <button
          type="button"
          class="rounded-xl border border-white/20 px-5 py-3 text-sm font-semibold text-white transition hover:bg-white/10"
        >
          View New Arrivals
        </button>
      </div>
    </section>

    <section class="mt-8 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
      <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <p class="text-sm font-medium text-gray-500">Category</p>
        <h2 class="mt-2 text-xl font-semibold text-gray-900">Sneakers</h2>
        <p class="mt-2 text-sm leading-6 text-gray-600">
          Daily footwear, retro runners, and standout silhouettes.
        </p>
      </div>
      <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <p class="text-sm font-medium text-gray-500">Category</p>
        <h2 class="mt-2 text-xl font-semibold text-gray-900">Clothing</h2>
        <p class="mt-2 text-sm leading-6 text-gray-600">
          Essential layers, hoodies, and relaxed everyday pieces.
        </p>
      </div>
      <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <p class="text-sm font-medium text-gray-500">Category</p>
        <h2 class="mt-2 text-xl font-semibold text-gray-900">Accessories</h2>
        <p class="mt-2 text-sm leading-6 text-gray-600">
          Caps, bags, and small details to complete the look.
        </p>
      </div>
      <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <p class="text-sm font-medium text-gray-500">Category</p>
        <h2 class="mt-2 text-xl font-semibold text-gray-900">Sale</h2>
        <p class="mt-2 text-sm leading-6 text-gray-600">
          Limited markdowns on selected items and seasonal edits.
        </p>
      </div>
    </section>

    <section class="mt-8 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm md:p-8">
      <div class="flex items-end justify-between gap-4">
        <div>
          <p class="text-sm font-medium text-gray-500">Featured</p>
          <h2 class="mt-2 text-2xl font-bold tracking-tight text-gray-900">
            Picks for your storefront
          </h2>
        </div>
        <a
          href="/products"
          class="text-sm font-medium text-gray-600 transition hover:text-gray-900"
        >
          Browse all
        </a>
      </div>

      <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-2xl border border-gray-200 bg-gray-50 p-4">
          <div class="aspect-[4/3] rounded-xl bg-gray-200" />
          <h3 class="mt-4 text-base font-semibold text-gray-900">Nike Air Runner</h3>
          <p class="mt-1 text-sm text-gray-500">Lightweight daily sneakers</p>
          <p class="mt-3 text-sm font-semibold text-gray-900">129,000원</p>
        </div>
        <div class="rounded-2xl border border-gray-200 bg-gray-50 p-4">
          <div class="aspect-[4/3] rounded-xl bg-gray-200" />
          <h3 class="mt-4 text-base font-semibold text-gray-900">Adidas Classic Hoodie</h3>
          <p class="mt-1 text-sm text-gray-500">Relaxed fit streetwear hoodie</p>
          <p class="mt-3 text-sm font-semibold text-gray-900">89,000원</p>
        </div>
        <div class="rounded-2xl border border-gray-200 bg-gray-50 p-4">
          <div class="aspect-[4/3] rounded-xl bg-gray-200" />
          <h3 class="mt-4 text-base font-semibold text-gray-900">New Balance Daily Runner</h3>
          <p class="mt-1 text-sm text-gray-500">Comfort-focused running shoes</p>
          <p class="mt-3 text-sm font-semibold text-gray-900">139,000원</p>
        </div>
        <div class="rounded-2xl border border-gray-200 bg-gray-50 p-4">
          <div class="aspect-[4/3] rounded-xl bg-gray-200" />
          <h3 class="mt-4 text-base font-semibold text-gray-900">Canvas Cross Bag</h3>
          <p class="mt-1 text-sm text-gray-500">Compact everyday carry</p>
          <p class="mt-3 text-sm font-semibold text-gray-900">59,000원</p>
        </div>
      </div>
    </section>

    <section class="mt-8 grid gap-4 md:grid-cols-3">
      <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <h3 class="text-base font-semibold text-gray-900">Fast Delivery</h3>
        <p class="mt-2 text-sm leading-6 text-gray-600">
          Build trust with simple shipping information and expected delivery flow.
        </p>
      </div>
      <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <h3 class="text-base font-semibold text-gray-900">Curated Selection</h3>
        <p class="mt-2 text-sm leading-6 text-gray-600">
          Highlight products that represent the tone and identity of your store.
        </p>
      </div>
      <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <h3 class="text-base font-semibold text-gray-900">Easy Shopping Flow</h3>
        <p class="mt-2 text-sm leading-6 text-gray-600">
          Keep discovery, cart, and checkout simple while you grow the project.
        </p>
      </div>
    </section>
  </AppLayout>
</template>
