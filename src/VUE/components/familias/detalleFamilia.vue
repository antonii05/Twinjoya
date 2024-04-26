<template>
    <h1>detalle familia</h1>
</template>

<script setup lang="ts">

import type { Familia } from "../../models/Familia";

defineProps({
    familia: {
        type: Object as () => Familia,
        required: true
    }
})
</script>