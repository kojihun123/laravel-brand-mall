<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import PageContainer from '@/Components/Layout/PageContainer.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
  products: {
    type: Object,
    required: true,
  },
});

const items = computed(() => props.products?.data ?? []);

const formatPrice = (price) => {
  return Math.floor(Number(price)).toLocaleString('ko-KR');
};
</script>

<template>
  <AppLayout>
    <PageContainer
      title="Products"
      description="Browse all available products."
      :breadcrumb="[
        { label: 'Home', href: '/' },
        { label: 'Products', href: '/products' },
      ]"
    >
      <section class="space-y-6">
        <div class="flex flex-col gap-3 rounded-2xl border border-gray-200 bg-gray-50 p-4 md:flex-row md:items-center md:justify-between">
          <div>
            <p class="text-sm font-medium text-gray-500">
              Product Catalog
            </p>
            <p class="mt-1 text-sm text-gray-600">
              {{ props.products.total }} items available in the store.
            </p>
          </div>

          <div class="flex items-center gap-2 text-sm text-gray-500">
            <span>Page {{ props.products.current_page }}</span>
            <span>/</span>
            <span>{{ props.products.last_page }}</span>
          </div>
        </div>

        <div
          v-if="items.length"
          class="grid gap-4 md:grid-cols-2 xl:grid-cols-3"
        >
          <article
            v-for="product in items"
            :key="product.id"
            class="overflow-hidden rounded-2xl border border-gray-200 bg-white transition hover:-translate-y-0.5 hover:shadow-md"
          >
            <div class="aspect-[4/3] bg-gray-100" />

            <div class="space-y-3 p-5">
              <div class="space-y-1">
                <p class="text-xs font-medium uppercase tracking-[0.18em] text-gray-400">
                  {{ product.sku }}
                </p>
                <h2 class="text-lg font-semibold tracking-tight text-gray-900">
                  {{ product.name }}
                </h2>
                <p class="text-sm leading-6 text-gray-600">
                  {{ product.short_description || 'No short description yet.' }}
                </p>
              </div>

              <div class="flex items-end justify-between gap-4">
                <div>
                  <p class="text-lg font-bold text-gray-900">
                    {{ formatPrice(product.price) }}원
                  </p>
                  <p
                    v-if="product.compare_at_price"
                    class="mt-1 text-sm text-gray-400 line-through"
                  >
                    {{ formatPrice(product.compare_at_price) }}원
                  </p>
                </div>

                <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                  Stock {{ product.stock_quantity }}
                </span>
              </div>

              <div class="flex items-center gap-2 pt-2">
                <button
                  type="button"
                  class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-700"
                >
                  Add to Cart
                </button>
                <Link
                  :href="route('products.show', product.slug)"
                  class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50"
                >
                  View Detail
                </Link>
              </div>
            </div>
          </article>
        </div>

        <div
          v-else
          class="rounded-2xl border border-dashed border-gray-300 bg-gray-50 px-6 py-12 text-center"
        >
          <p class="text-lg font-semibold text-gray-900">
            No products found
          </p>
          <p class="mt-2 text-sm text-gray-500">
            Add products in the database or seed more sample data to populate this page.
          </p>
        </div>

        <div
          v-if="props.products.links?.length > 3"
          class="flex flex-wrap items-center justify-center gap-2 pt-2"
        >
          <Link
            v-for="(link, index) in props.products.links"
            :key="`${link.label}-${index}`"
            :href="link.url || ''"
            class="rounded-lg border px-3 py-2 text-sm font-medium transition"
            :class="[
              link.active
                ? 'border-gray-900 bg-gray-900 text-white'
                : 'border-gray-300 bg-white text-gray-700 hover:bg-gray-50',
              !link.url && 'pointer-events-none opacity-40',
            ]"
            v-html="link.label"
          />
        </div>
      </section>
    </PageContainer>
  </AppLayout>
</template>
