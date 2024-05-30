<template>
    <div>
        <h1>Otros Costes</h1>
    </div>
</template>

<script setup lang="ts">
//import { ref, onMounted } from "vue";
import type { FacturasProveedor} from "../../../models/FacturasProveedor";


defineProps({
    facturaProveedor:{
        type: Object as () => FacturasProveedor,
        required: true,
    }
})
</script>

<style scoped>
/* Code here  */
</style>
