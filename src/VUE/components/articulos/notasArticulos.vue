<template>
    <CardComponent >
        <h1>Notas</h1>
    </CardComponent>
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import CardComponent from "../helpers/CardComponent.vue";
import type { Articulo } from "../../models/Articulo";

defineProps(
    {
        articulo: {
            type: Object as () => Articulo,
            required: true,
        }
    });

//posible async
onMounted(() => {

});
</script>