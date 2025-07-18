<template>
    <AppLayout>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <StatCard v-if="role === 'admin'" icon="mdi:account-group-outline" title="Users"
                      :value="stats.users.value"/>
            <StatCard icon="mdi:truck-outline" title="Tasks" :value="stats.tasks.value"/>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <UsersCard v-if="role === 'admin'" :users="users"/>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Components/Layouts/AppLayout.vue';
import StatCard from '@/Components/Cards/StatCard.vue';
import UsersCard from '@/Components/Cards/UsersCard.vue';
import {defineProps} from 'vue';

const props = defineProps({
    stats: Object,
    users: Array,
    role: String
});

</script>

<style scoped>
</style>
