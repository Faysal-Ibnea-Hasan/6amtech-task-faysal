<!-- resources/js/Components/Forms/SubmitButton.vue -->
<template>
    <button
        type="submit"
        :disabled="processing"
        class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed transition-colors"
        style="height: 52px;"
    >
    <span v-if="processing" class="flex items-center justify-center">
      <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
           viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor"
              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
      </svg>
      <slot name="loading-text">Processing...</slot>
    </span>
        <span v-else>
      <slot></slot> <!-- Default slot for button text -->
    </span>
    </button>
</template>

<script setup>
import { defineProps } from 'vue';

defineProps({
    processing: {
        type: Boolean,
        default: false,
    },
});
</script>

<style scoped>
button:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
</style>
