<template>
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Monthly Sales</h3>
            <div class="relative group">
                <button class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v.01M12 12v.01M12 18v.01M12 21a9 9 0 110-18 9 9 0 010 18z"></path>
                    </svg>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg hidden group-hover:block">
                    <p class="px-4 py-2 text-sm text-gray-700">Data for monthly sales performance.</p>
                </div>
            </div>
        </div>

        <Bar :data="chartData" :options="chartOptions" />
    </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue';
import { Bar } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

const props = defineProps({
    data: Object
});

const chartData = computed(() => ({
    labels: props.data.labels,
    datasets: [
        {
            label: 'Sales',
            backgroundColor: '#3b82f6',
            data: props.data.data,
            borderRadius: 4,
        },
    ],
}));

const chartOptions = ref({
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        legend: {
            display: false,
        },
        tooltip: {
            mode: 'index',
            intersect: false,
        },
    },
    scales: {
        x: {
            grid: {
                display: false,
            },
            ticks: {
                color: '#6b7280',
            },
        },
        y: {
            beginAtZero: true,
            grid: {
                color: '#e5e7eb',
            },
            ticks: {
                color: '#6b7280',
                callback: function(value) {
                    return value + '';
                }
            }
        },
    },
});

</script>

<style scoped>

</style>
