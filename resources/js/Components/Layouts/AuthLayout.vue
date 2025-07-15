<!-- resources/js/Components/Layouts/AuthLayout.vue -->
<template>
    <div class="min-h-screen bg-gray-50 flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 w-full max-w-md mx-auto">
            <slot></slot>
        </div>
    </div>
</template>

<script setup>

</script>

<style scoped>
.bg-gray-50 {
    background-color: #f9fafb;
}

* {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
}
</style>
