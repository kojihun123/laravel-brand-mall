<script setup>

import { Link } from '@inertiajs/vue3';

const props = defineProps({
  title: {
    type: String,
    default: '',
  },
  description: {
    type: String,
    default: '',
  },
  breadcrumb: {
    type: Array,
    default: () => [],
  },
});

</script>

<template>
  <section class="rounded-2xl border border-gray-200 bg-white shadow-sm">
    <div class="px-5 py-4 md:px-6 md:py-4">
      <div
        v-if="props.breadcrumb.length"
        class="mb-2 flex flex-wrap items-center gap-2 text-xs text-gray-500"
      >
        <template
          v-for="(item, index) in props.breadcrumb"
          :key="`${item.label}-${index}`"
        >
          <span>
            <Link :href="item.href">{{ item.label }}</Link>
          </span>
          <span v-if="index !== props.breadcrumb.length - 1">/</span>
        </template>
      </div>

      <h1
        v-if="props.title"
        class="text-xl font-bold tracking-tight text-gray-900"
      >
        {{ props.title }}
      </h1>

      <p
        v-if="props.description"
        class="mt-1 text-sm leading-5 text-gray-600"
      >
        {{ props.description }}
      </p>
    </div>

    <div class="border-t border-gray-200 px-5 py-5 md:px-6 md:py-6">
      <slot />
    </div>
  </section>
</template>
