<template>
    <div class="bg-white p-6 rounded-lg shadow-sm flex items-center justify-between">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                <Icon :icon="icon" class="text-2xl" />
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500">{{ title }}</p>
                <p class="text-2xl font-bold text-gray-800">{{ value }}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue'
import { Icon } from '@iconify/vue'

const props = defineProps({
    icon: String,
    title: String,
    value: [String, Number],
})
</script>
