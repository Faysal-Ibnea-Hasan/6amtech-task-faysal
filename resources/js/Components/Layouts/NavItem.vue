<script setup>
import { ref, computed, watch } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import {Icon} from "@iconify/vue";

const props = defineProps({
    icon: String,
    text: String,
    href: {
        type: String,
        default: '#',
    },
    isActive: {
        type: Boolean,
        default: false,
    },
    subItems: {
        type: Array,
        default: () => [],
    },
});

const page = usePage();
const subMenuOpen = ref(false);
const normalize = (str) => str.replace(/^\/+|\/+$/g, '').toLowerCase();

const currentPath = computed(() => normalize(page.url));
const basePath = computed(() => normalize(props.href));

const shouldOpen = computed(() => {
    if (!props.subItems.length) return false;

    const submenuPaths = props.subItems.map(sub =>
        `${basePath.value}/${sub.toLowerCase().replace(/\s+/g, '-')}`
    );

    return submenuPaths.some(path => currentPath.value.startsWith(path));
});

watch(shouldOpen, (val) => {
    subMenuOpen.value = val;
}, { immediate: true });

const handleClick = (e) => {
    if (props.subItems.length > 0) {
        e.preventDefault();
        subMenuOpen.value = !subMenuOpen.value;
    }
};
</script>

<template>
    <div>
        <component
            :is="href === '#' || subItems.length ? 'button' : Link"
            :href="href !== '#' && !subItems.length ? href : undefined"
            class="flex items-center justify-between w-full py-2 px-4 rounded-md transition-colors duration-200 ease-in-out"
            :class="[
        isActive ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900'
      ]"
            @click="handleClick"
        >
            <div class="flex items-center">
                <Icon :icon="icon" class="text-2xl p-1" />
                <span class="text-sm font-medium">{{ text }}</span>
            </div>
            <svg
                v-if="subItems.length"
                :class="['w-4 h-4 transition-transform', { 'rotate-90': subMenuOpen }]"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </component>

        <div v-if="subItems.length && subMenuOpen" class="ml-8 mt-1 space-y-1">
            <Link
                v-for="subItem in subItems"
                :key="subItem"
                :href="`${href}/${subItem.toLowerCase().replace(/\s+/g, '-')}`"
                class="block py-1.5 px-2 rounded-md text-sm text-gray-600 hover:bg-gray-50 hover:text-gray-800 transition duration-200 ease-in-out"
                :class="{
          'text-blue-700 font-semibold': currentPath.startsWith(
            `${basePath}/${subItem.toLowerCase().replace(/\s+/g, '-')}`
          )
        }"
            >
                {{ subItem }}
            </Link>
        </div>
    </div>
</template>
