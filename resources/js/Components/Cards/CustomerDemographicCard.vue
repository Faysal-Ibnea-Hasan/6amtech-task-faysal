<template>
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Customers Demographic</h3>
            <div class="relative group">
                <button class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v.01M12 12v.01M12 18v.01M12 21a9 9 0 110-18 9 9 0 010 18z"></path>
                    </svg>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg hidden group-hover:block">
                    <p class="px-4 py-2 text-sm text-gray-700">Number of customer based on country</p>
                </div>
            </div>
        </div>
        <p class="text-sm text-gray-500 mb-4">Number of customer based on country</p>

        <div class="w-full h-48 bg-gray-100 rounded-md flex items-center justify-center mb-6 overflow-hidden relative">
            <svg viewBox="0 0 1000 600" class="w-full h-full" fill="#e5e7eb">
                <path d="M400 150 L450 100 L500 150 L450 200 Z" fill="#D1D5DB"></path>
                <path d="M600 200 L650 150 L700 200 L650 250 Z" fill="#D1D5DB"></path>
                <circle cx="425" cy="175" r="10" fill="#3b82f6"></circle> <circle cx="675" cy="225" r="10" fill="#3b82f6"></circle> <path d="M545.9 144.5L547.4 144.5L547.4 143.9L545.9 143.9L545.9 144.5ZM545.9 143.9L545.9 143.2L547.4 143.2L547.4 143.9L545.9 143.9ZM547.4 143.9L547.4 143.2L548.1 143.2L548.1 143.9L547.4 143.9Z" fill="#D1D5DB"></path>
            </svg>
            <div class="absolute bottom-2 right-2 text-xs text-gray-500">Map data placeholder</div>
        </div>

        <div class="space-y-4">
            <div v-for="country in data" :key="country.country" class="flex items-center">
                <img :src="`/images/flags/${country.country.toLowerCase()}.png`" :alt="country.country + ' flag'" class="w-6 h-4 mr-3 rounded shadow-sm object-cover">
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-800">{{ country.country }} <span class="text-gray-500 text-xs ml-1">{{ country.customers }} Customers</span></p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mt-1">
                        <div class="bg-blue-600 h-2.5 rounded-full" :style="{ width: country.percentage + '%' }"></div>
                    </div>
                </div>
                <span class="ml-4 text-sm font-semibold text-gray-800">{{ country.percentage }}%</span>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    data: Array
});


</script>

<style scoped>

</style>
