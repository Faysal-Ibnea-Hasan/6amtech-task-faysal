<template>
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Recent Users</h3>
            <div class="flex items-center space-x-2">
                <button class="flex items-center px-3 py-1 rounded-md text-sm text-gray-600 hover:bg-gray-50">
                    <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01.293.707V19a1 1 0 01-1 1H4a1 1 0 01-1-1v-14zm9 0v4"></path>
                    </svg>
                    Filter
                </button>
                <button class="px-3 py-1 rounded-md text-sm text-blue-600 hover:bg-blue-50">See all</button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="user in users" :key="user.id">
                    <td class="px-4 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ user.name }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ user.email }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ user.role }}</td>
                    <td class="px-4 py-3 whitespace-nowrap">
                            <span :class="['px-2 inline-flex text-xs leading-5 font-semibold rounded-full']">
                                {{user.is_active}}
                            </span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    users: Array
});
</script>

<style scoped>

</style>
