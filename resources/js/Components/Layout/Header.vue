<script setup>
import { computed } from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();

const user = computed(() => page.props.auth?.user ?? null);
</script>

<template>
  <header class="sticky top-0 z-50 border-b border-gray-200 bg-white">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4">
      <Link
        href="/"
        class="text-xl font-bold tracking-tight text-gray-900"
      >
        Laravel Brand Mall
      </Link>

      <nav class="hidden items-center gap-6 text-sm font-medium text-gray-600 md:flex">
        <Link href="/" class="transition hover:text-gray-900">
          Home
        </Link>
        <Link href="/products" class="transition hover:text-gray-900">
          Products
        </Link>
        <button type="button" class="transition hover:text-gray-900">
          Categories
        </button>
        <button type="button" class="transition hover:text-gray-900">
          Cart
        </button>
      </nav>

      <div class="flex items-center gap-3">
        <template v-if="user">
          <Dropdown align="right" width="48">
            <template #trigger>
              <div
                class="inline-flex cursor-pointer items-center gap-3 rounded-lg px-2 py-1.5 text-sm font-medium text-gray-700 transition hover:bg-gray-50"
              >
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-200 text-xs font-semibold text-gray-600">
                  {{ user.name?.charAt(0) }}
                </div>
                <span class="hidden md:inline">
                  {{ user.name }}
                </span>
                <svg
                  class="h-4 w-4 text-gray-400"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  />
                </svg>
              </div>
            </template>

            <template #content>
              <DropdownLink href="/profile">
                Profile
              </DropdownLink>
              <DropdownLink
                href="/logout"
                method="post"
                as="button"
              >
                Logout
              </DropdownLink>
            </template>
          </Dropdown>
        </template>

        <template v-else>
          <Link
            href="/login"
            class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50"
          >
            Login
          </Link>
          <Link
            href="/register"
            class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-700"
          >
            Register
          </Link>
        </template>
      </div>
    </div>
  </header>
</template>
