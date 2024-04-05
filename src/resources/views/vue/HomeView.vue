<template>
    <div v-if="tareas">
        <h1>Home</h1>
    </div>
</template>


<!-- * Prueba -->
<script setup lang="ts">
import ejemploAPi from "../../../VUE/api/ejemploAPi"
import { Task } from '../../../VUE/models/Task';
import { onMounted, ref } from "vue";

const tareas = ref({} as Task);

onMounted(async () => {
    tareas.value = await ejemploAPi.listar();
});
</script>../../../VUE/api/ejemploAPi
