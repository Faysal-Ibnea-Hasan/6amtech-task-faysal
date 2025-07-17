<template>
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Monthly Target</h3>
            <div class="relative group">
                <button class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v.01M12 12v.01M12 18v.01M12 21a9 9 0 110-18 9 9 0 010 18z"></path>
                    </svg>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg hidden group-hover:block">
                    <p class="px-4 py-2 text-sm text-gray-700">Target you've set for each month</p>
                </div>
            </div>
        </div>
        <p class="text-sm text-gray-500 mb-4">Target you've set for each month</p>

        <div class="flex flex-col items-center justify-center">
            <div class="relative w-40 h-40">
                <svg viewBox="0 0 100 100" class="absolute inset-0">
                    <circle cx="50" cy="50" r="45" fill="none" stroke="#e5e7eb" stroke-width="8" stroke-dasharray="282.7" stroke-dashoffset="70.6"></circle>
                    <circle cx="50" cy="50" r="45" fill="none" stroke="#2563eb" stroke-width="8"
                            :stroke-dasharray="circumference"
                            :stroke-dashoffset="dashoffset"
                            stroke-linecap="round"
                            transform="rotate(-90 50 50)">
                    </circle>
                </svg>
                <div class="absolute inset-0 flex flex-col items-center justify-center">
                    <span class="text-3xl font-bold text-gray-900">{{ data.percentage }}%</span>
                    <span class="text-xs text-gray-500 mt-1">
                        <span class="text-green-500 font-semibold">{{ data.todayChange }}</span>
                    </span>
                </div>
            </div>

            <p class="text-center text-sm text-gray-600 mt-4 max-w-xs">{{ data.message }}</p>

            <div class="flex justify-around w-full mt-6 text-center">
                <div>
                    <p class="text-sm text-gray-500">Target</p>
                    <p class="text-base font-semibold text-gray-800">{{ data.targetAmount }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Revenue</p>
                    <p class="text-base font-semibold text-gray-800">{{ data.revenueAmount }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Today</p>
                    <p class="text-base font-semibold text-gray-800">{{ data.todayAmount }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, computed } from 'vue';

const props = defineProps({
    data: Object
});

const radius = 45;
const circumference = 2 * Math.PI * radius;

const dashoffset = computed(() => {
    const gaugeArcLength = (3 / 4) * circumference;
    return gaugeArcLength * (1 - props.data.percentage / 100);
});
const progressCircumference = computed(() => (3/4) * (2 * Math.PI * radius));

const progressDashoffset = computed(() => {

    return progressCircumference.value * (1 - props.data.percentage / 100);
});

</script>

<style scoped>

</style>
