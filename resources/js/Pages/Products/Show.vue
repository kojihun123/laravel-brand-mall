<script setup>
import { ref } from 'vue';
import PageContainer from '@/Components/Layout/PageContainer.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
  product: {
    type: Object,
    required: true,
  },
});

const formatPrice = (price) => {
  return Math.floor(Number(price)).toLocaleString('ko-KR');
};

const quantity = ref(1);
</script>

<template>
  <AppLayout>
    <PageContainer
      :title="props.product.name"
      :description="props.product.short_description || 'Browse product details and basic purchasing information.'"
      :breadcrumb="[
        { label: 'Home', href: '/' },
        { label: 'Products', href: route('products.index') },
        { label: props.product.slug, href: route('products.show', { slug: props.product.slug }) },
      ]"
    >
      <section class="space-y-8">
        <div class="grid gap-6 lg:grid-cols-2">
          <div>
            <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white">
              <div class="flex min-h-[420px] items-center justify-center bg-gray-50 p-8">
                  <div class="text-center">
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-gray-200">
                      <svg
                        class="h-10 w-10 text-gray-400"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.5"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l3.159 3.159M3.75 19.5h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm11.25-10.5h.008v.008H15V9Z"
                        />
                      </svg>
                    </div>
                    <p class="mt-4 text-base font-medium text-gray-600">
                      Product image
                    </p>
                    <p class="mt-1 text-sm text-gray-400">
                      Image preview will appear here.
                    </p>
                  </div>
              </div>
            </div>
          </div>

          <div class="min-w-0">
            <div class="rounded-2xl border border-gray-200 bg-white p-6">
              <p class="text-sm font-medium text-gray-500">
                브랜드명
              </p>
              <p class="text-xs font-medium uppercase tracking-[0.18em] text-gray-400">
                SKU · {{ props.product.sku }}
              </p>
              <h1 class="mt-3 text-2xl font-bold tracking-tight text-gray-900">
                {{ props.product.name }}
              </h1>
              <p class="mt-3 text-sm leading-6 text-gray-600">
                {{ props.product.short_description || 'No short description yet.' }}
              </p>

              <div class="mt-6 rounded-2xl bg-gray-50 p-5">
                <p class="text-sm text-gray-500">
                  가격
                </p>
                <div class="mt-2 flex items-end gap-3">
                  <p class="text-3xl font-bold tracking-tight text-gray-900">
                    {{ formatPrice(props.product.price) }}원
                  </p>
                  <p
                    v-if="props.product.compare_at_price"
                    class="text-sm text-gray-400 line-through"
                  >
                    {{ formatPrice(props.product.compare_at_price) }}원
                  </p>
                </div>
              </div>

              <div class="mt-6 border-t border-gray-100 pt-6">
                <div class="rounded-2xl border border-gray-200 bg-white p-4">
                <div class="grid gap-4 sm:grid-cols-2">
                  <div>
                    <p class="text-xs font-medium uppercase tracking-[0.18em] text-gray-400">
                      판매 상태
                    </p>
                    <p class="mt-1 text-sm font-semibold text-gray-900">
                      {{ props.product.stock_quantity > 0 ? '재고 있음' : '품절' }}
                    </p>
                  </div>
                  <div>
                    <p class="text-xs font-medium uppercase tracking-[0.18em] text-gray-400">
                      재고 수량
                    </p>
                    <p class="mt-1 text-sm font-semibold text-gray-900">
                      {{ props.product.stock_quantity }}
                    </p>
                  </div>
                </div>
              </div>
              </div>

              <div class="mt-6 border-t border-gray-100 pt-6">
                <div class="flex flex-nowrap items-stretch gap-3">
                  <div class="shrink-0 rounded-lg border border-gray-300 bg-white">
                    <div class="flex items-center justify-between">
                      <button
                        type="button"
                        class="flex items-center justify-center px-2 py-2 text-lg text-gray-500 transition hover:bg-gray-50"
                        @click="quantity = Math.max(1, quantity - 1)"
                      >
                        -
                      </button>
                      <span class="px-3 py-2 text-center text-base font-semibold text-gray-900">
                        {{ quantity }}
                      </span>
                      <button
                        type="button"
                        class="flex items-center justify-center px-2 py-2 text-lg text-gray-500 transition hover:bg-gray-50"
                        @click="quantity += 1"
                      >
                        +
                      </button>
                    </div>
                  </div>

                  <button
                    type="button"
                    class="min-w-0 flex-1 rounded-lg border border-gray-300 px-6 py-4 text-sm font-medium text-gray-700 transition hover:bg-gray-50"
                  >
                    장바구니 담기
                  </button>
                  <button
                    type="button"
                    class="min-w-0 flex-1 rounded-lg bg-gray-900 px-6 py-4 text-sm font-medium text-white transition hover:bg-gray-700"
                  >
                    바로 구매
                  </button>
                </div>
              </div>

              <a
                :href="route('products.index')"
                class="mt-8 inline-flex text-sm font-medium text-gray-500 transition hover:text-gray-900"
              >
                상품 목록으로 돌아가기
              </a>
            </div>
          </div>
        </div>

        <div class="mt-2 rounded-2xl border border-gray-200 bg-white p-6">
          <div class="rounded-2xl bg-gray-50 p-6">
            <h2 class="text-lg font-semibold text-gray-900">
              상품 상세 설명
            </h2>
            <p class="mt-4 text-sm leading-8 text-gray-600">
              {{ props.product.description || '상품 상세 설명이 아직 등록되지 않았습니다.' }}
            </p>
          </div>
        </div>
      </section>
    </PageContainer>
  </AppLayout>
</template>
