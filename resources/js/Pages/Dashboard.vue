<template>
    <AppLayout>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <StatCard icon="mdi:account-group-outline" title="Users" :value="stats.users.value" />
            <StatCard icon="mdi:truck-outline" title="Tasks" :value="stats.tasks.value"/>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <RecentOrdersCard :orders="recentOrders" />
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Components/Layouts/AppLayout.vue';
import StatCard from '@/Components/Cards/StatCard.vue';
// import MonthlyTargetGaugeCard from '@/Components/Cards/MonthlyTargetGaugeCard.vue';
// import MonthlySalesChartCard from '@/Components/Cards/MonthlySalesChartCard.vue';
// import StatisticsChartCard from '@/Components/Cards/StatisticsChartCard.vue';
// import CustomersDemographicCard from '@/Components/Cards/CustomerDemographicCard.vue';
import RecentOrdersCard from '@/Components/Cards/RecentOrdersCard.vue';
import { defineProps } from 'vue';

const props = defineProps({
    stats: Object,
    monthlyTarget: Object,
    monthlySalesData: Object,
    statisticsData: Object,
    customerDemographic: Array,
    recentOrders: Array,
});

</script>

<style scoped>
</style>
