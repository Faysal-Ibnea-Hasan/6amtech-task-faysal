<template>
    <AppLayout>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <StatCard v-if="role === 'admin'" icon="fa-solid:user" title="Users"
                      :value="stats.users.value"/>
            <StatCard v-if="role === 'admin'" icon="ix:product" title="Total Products"
                      :value="products"/>
            <StatCard v-if="role === 'admin'" icon="nrk:category" title="Total Categories"
                      :value="categories"/>
            <StatCard v-if="role === 'admin'" icon="fa6-solid:money-bill-transfer" title="Total Transactions($)"
                      :value="transactions"/>
            <StatCard icon="tdesign:task-marked" title="Tasks" :value="stats.tasks.value"/>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <UsersCard v-if="role === 'admin'" :users="users"/>
            <TasksCard :tasks="tasks"/>
        </div>

    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Components/Layouts/AppLayout.vue';
import StatCard from '@/Components/Cards/StatCard.vue';
import UsersCard from '@/Components/Cards/UsersCard.vue';
import {defineProps} from 'vue';
import TasksCard from "@/Components/Cards/TasksCard.vue";

const props = defineProps({
    stats: Object,
    users: Array,
    tasks: Array,
    role: String,
    products: Number,
    categories: Number,
    transactions: Number
});

</script>

<style scoped>
</style>
