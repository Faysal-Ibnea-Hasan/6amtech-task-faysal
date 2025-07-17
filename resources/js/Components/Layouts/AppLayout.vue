<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import Sidebar from './Sidebar.vue';
import Header from './Header.vue';

const windowWidth = ref(window.innerWidth);
const isSidebarOpen = ref(window.innerWidth >= 1024); // Start open on large screens

const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value;
};

const handleResize = () => {
    windowWidth.value = window.innerWidth;
    if (window.innerWidth < 1024) {
        isSidebarOpen.value = false; // Close on small screens
    } else {
        isSidebarOpen.value = true; // Open on large screens
    }
};

onMounted(() => {
    window.addEventListener('resize', handleResize);
});

onUnmounted(() => {
    window.removeEventListener('resize', handleResize);
});
</script>

<template>
    <div class="flex h-screen bg-gray-100">
        <Sidebar :is-open="isSidebarOpen" @toggle-sidebar="toggleSidebar" />

        <div
            :class="[
                'flex-1 flex flex-col overflow-hidden transition-all duration-200 ease-in-out',
                { 'ml-64': isSidebarOpen && windowWidth >= 1024 } // Add ml-64 only when sidebar is open and on large screens
            ]"
        >
            <Header @toggle-sidebar="toggleSidebar" />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6 sm:p-8">
                <slot></slot>
            </main>
        </div>
    </div>
</template>
