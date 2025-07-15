<!-- resources/js/Components/Forms/FormInput.vue -->
<template>
    <div>
        <label :for="id" class="block text-sm font-medium text-gray-700 mb-2">
            {{ label }}
        </label>
        <input
            :id="id"
            :type="type"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            :placeholder="placeholder"
            :required="required"
            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-900 placeholder-gray-400"
            style="height: 52px;"
        />
        <div v-if="error" class="mt-1 text-sm text-red-600">
            {{ error }}
        </div>
    </div>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

defineProps({
    id: {
        type: String,
        required: true,
    },
    label: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: 'text',
    },
    placeholder: {
        type: String,
        default: '',
    },
    modelValue: { // For v-model binding
        type: [String, Number],
        default: '',
    },
    error: {
        type: String,
        default: '',
    },
    required: {
        type: Boolean,
        default: false,
    }
});

defineEmits(['update:modelValue']);
</script>

<style scoped>
input::placeholder {
    color: #9ca3af;
    opacity: 1;
}

input:focus {
    box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
}
</style>
