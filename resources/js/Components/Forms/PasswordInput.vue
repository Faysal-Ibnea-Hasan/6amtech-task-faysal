<!-- resources/js/Components/Forms/PasswordInput.vue -->
<template>
    <div>
        <label :for="id" class="block text-sm font-medium text-gray-700 mb-2">
            {{ label }}
        </label>
        <div class="relative">
            <input
                :id="id"
                :type="showPassword ? 'text' : 'password'"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                :placeholder="placeholder"
                :required="required"
                class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-900 placeholder-gray-400"
                style="height: 52px;"
            />
            <button
                type="button"
                @click="togglePassword"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
            >
                <svg v-if="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>
                </svg>
            </button>
        </div>
        <div v-if="error" class="mt-1 text-sm text-red-600">
            {{ error }}
        </div>
    </div>
</template>

<script setup>
import { ref, defineProps, defineEmits } from 'vue';

defineProps({
    id: {
        type: String,
        required: true,
    },
    label: {
        type: String,
        required: true,
    },
    placeholder: {
        type: String,
        default: '',
    },
    modelValue: { // For v-model binding
        type: String,
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

const showPassword = ref(false);

const togglePassword = () => {
    showPassword.value = !showPassword.value;
};
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
