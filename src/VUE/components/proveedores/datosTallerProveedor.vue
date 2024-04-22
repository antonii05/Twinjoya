<template>
    <CardComponent>
        <h2>Datos de Taller</h2>
    </CardComponent>
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import CardComponent from "../helpers/CardComponent.vue";

defineProps({
    proveedor:{
        type: Object,
        required: true,
    }
})

//posible async
onMounted(() => {

});
</script>