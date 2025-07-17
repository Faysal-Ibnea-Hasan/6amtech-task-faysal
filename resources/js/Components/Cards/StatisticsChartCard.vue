<template>
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Statistics</h3>
            <div class="flex items-center space-x-2 text-sm">
                <button
                    v-for="tab in tabs"
                    :key="tab"
                    @click="activeTab = tab"
                    :class="['px-3 py-1 rounded-md transition-colors', activeTab === tab ? 'bg-blue-100 text-blue-700 font-medium' : 'text-gray-600 hover:bg-gray-50']"
                >
                    {{ tab }}
                </button>
                <span class="text-gray-500">|</span>
                <span class="text-gray-700">05 Feb - 06 March</span>
                <button class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v.01M12 12v.01M12 18v.01M12 21a9 9 0 110-18 9 9 0 010 18z"></path>
                    </svg>
                </button>
            </div>
        </div>
        <p class="text-sm text-gray-500 mb-4">Target you've set for each month</p>

        <Line :data="chartData" :options="chartOptions" />
    </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue';
import { Line } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, LineElement, CategoryScale, LinearScale, PointElement } from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, LineElement, CategoryScale, LinearScale, PointElement);

const props = defineProps({
    data: Object
});

const tabs = ref(['Overview', 'Sales', 'Revenue']);
const activeTab = ref('Overview');

const chartData = computed(() => {
    let dataset;
    let labelColor;

    if (activeTab.value === 'Overview') {
        dataset = props.data.overview;
        labelColor = '#3b82f6';
    } else if (activeTab.value === 'Sales') {
        dataset = props.data.sales;
        labelColor = '#10b981';
    } else { // Revenue
        dataset = props.data.revenue;
        labelColor = '#f59e0b';
    }

    return {
        labels: props.data.labels,
        datasets: [
            {
                label: activeTab.value,
                backgroundColor: labelColor,
                borderColor: labelColor,
                data: dataset,
                fill: false,
                tension: 0.4, // Smooth curve
                pointBackgroundColor: labelColor,
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: labelColor,
            },
        ],
    };
});

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
