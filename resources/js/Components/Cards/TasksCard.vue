<template>
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Recent Tasks</h3>
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
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assigned to</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assigned By</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due Date</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="task in tasks" :key="task.id">
                    <td class="px-4 py-3 whitespace-nowrap">
                        <div class="flex items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ task.title }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ task.status }}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ task.assignee ? task.assignee.name : ""}}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ task.assigner ? task.assigner.name : ""}}</td>
                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ task.expire_date }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import {defineProps, onMounted} from 'vue';

const props = defineProps({
    tasks: Array
});

onMounted(() => {
    console.log('Tasks data received:', props.tasks);

    // You can also loop through them to check individual tasks
    if (props.tasks && props.tasks.length > 0) {
        console.log('First task:', props.tasks[0]); // Check the first task
        // To inspect each task in detail, uncomment this:
        // props.tasks.forEach(task => {
        //     console.log('Task ID:', task.id, 'Title:', task.title, 'Assignee:', task.assignee?.name, 'Assigner:', task.assigner?.name);
        // });
    } else {
        console.log('No tasks data received or tasks array is empty.');
    }
});
</script>

<style scoped>

</style>
