<script setup>
import { usePage } from '@inertiajs/vue3'
const page = usePage()
</script>

<template>
    <div v-if="page.props.flash.success" class="alert alert-success">
        {{ page.props.flash.success }}
    </div>
<div>hello admin</div>
</template>

<style scoped>

</style>
