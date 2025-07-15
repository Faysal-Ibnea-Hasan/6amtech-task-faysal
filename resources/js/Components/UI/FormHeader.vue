<!-- resources/js/Components/UI/FormHeader.vue -->
<template>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ title }}</h1>
        <p class="text-gray-600 text-base">{{ subtitle }}</p>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

defineProps({
    title: {
        type: String,
        required: true,
    },
    subtitle: {
        type: String,
        required: true,
    },
});
</script>

<style scoped>

</style>
