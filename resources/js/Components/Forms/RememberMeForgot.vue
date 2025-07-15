<template>
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <input
                :id="checkboxId"
                :checked="modelValue"
                @change="$emit('update:modelValue', $event.target.checked)"
                type="checkbox"
                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
            />
            <label :for="checkboxId" class="ml-2 text-sm text-gray-600">
                {{ rememberText }}
            </label>
        </div>
        <div>
            <a :href="forgotPasswordLink" class="text-sm text-blue-600 hover:text-blue-500">
                {{ forgotPasswordText }}
            </a>
        </div>
    </div>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

defineProps({
    checkboxId: {
        type: String,
        default: 'remember',
    },
    modelValue: { // For v-model binding of the checkbox
        type: Boolean,
        default: false,
    },
    rememberText: {
        type: String,
        default: 'Remember me',
    },
    forgotPasswordText: {
        type: String,
        default: 'Forgot Password?',
    },
    forgotPasswordLink: {
        type: String,
        default: '#',
    },
});

defineEmits(['update:modelValue']);
</script>

<style scoped>
input[type="checkbox"] {
    accent-color: #2563eb;
}
</style>
