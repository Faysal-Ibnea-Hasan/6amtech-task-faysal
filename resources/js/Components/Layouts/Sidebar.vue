<template>
  <div
      :class="[
            'bg-white text-gray-700 w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform transition duration-200 ease-in-out z-20',
            { '-translate-x-full lg:translate-x-0': !isOpen }
        ]"
  >
    <div class="flex items-start justify-start px-4">
      <img src="/images/tailadmin.png" alt="TailAdmin" class="h-8 w-auto mr-2">
      <span class="text-lg font-semibold text-gray-800">TailAdmin</span>
    </div>

    <nav class="space-y-1">
      <h3 class="text-xs font-semibold text-gray-400 uppercase px-4 mb-2">MENU</h3>
      <NavItem icon="mdi:view-dashboard-outline" text="Dashboard" href="/dashboard"
               :sub-items="['Ecommerce', 'Analytics', 'Marketing','CRM','Stocks']"/>
      <NavItem icon="mdi:calendar-month-outline" text="Calendar"/>
      <NavItem icon="mdi:account-box-multiple-outline" text="User Profile"/>
      <NavItem icon="mdi:clipboard-text-outline" text="Task"/>
      <NavItem icon="mdi:form-select" text="Forms"/>
      <NavItem icon="mdi:table-furniture" text="Tables"/>
      <NavItem icon="mdi:page-next-outline" text="Pages"/>

      <h3 class="text-xs font-semibold text-gray-400 uppercase px-4 mt-6 mb-2">SUPPORT</h3>
      <NavItem icon="mdi:chat-outline" text="Chat"/>
      <NavItem icon="mdi:email-outline" text="Email"/>
      <NavItem icon="mdi:invoice-text-outline" text="Invoice"/>

      <h3 class="text-xs font-semibold text-gray-400 uppercase px-4 mt-6 mb-2">OTHERS</h3>
      <NavItem icon="mdi:chart-line-variant" text="Charts"/>
      <NavItem icon="mdi:element-plus" text="UI Elements"/>
      <NavItem icon="mdi:account-key-outline" text="Authentication"/>
    </nav>

    <div class="px-4 mt-8">
      <div class="bg-blue-600 rounded-lg p-4 text-white text-center">
        <p class="font-semibold text-sm">TailAdmin Pro</p>
        <p class="text-xs mt-1">Get all dashboard and 300+ essential UI elements</p>
        <button class="mt-4 bg-white text-blue-600 hover:bg-blue-50 px-4 py-2 rounded-md text-xs font-medium">
          Upgrade Plan
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import {defineProps, defineEmits} from 'vue';
import NavItem from './NavItem.vue';

const props = defineProps({
  isOpen: {
    type: Boolean,
    default: true
  }
});

const emit = defineEmits(['toggle-sidebar']);

</script>

<style scoped>

@media (min-width: 1024px) {
  .lg\:translate-x-0 {
    transform: translateX(0) !important;
  }
}
</style>
