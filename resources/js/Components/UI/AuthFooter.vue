<!-- resources/js/Components/UI/AuthFooter.vue -->
<template>
    <div class="mt-8 text-center">
        <p class="text-sm text-gray-600">
            {{ text }}
            <a :href="to" class="text-blue-600 hover:text-blue-500 font-medium">{{ linkText }}</a>
        </p>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

defineProps({
    text: {
        type: String,
        default: 'Already have an account?',
    },
    linkText: {
        type: String,
        default: 'Sign in',
    },
    to: {
        type: String,
        required: true,
    },
});
</script>

<style scoped>
/* No specific styles needed here */
</style>
