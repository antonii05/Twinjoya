<template>
    <div v-if="tareas">
        <h1>Home</h1>
        {{ tareas }}
    </div>
</template>

<!-- * Prueba -->
<script setup lang="ts">
import TareaApi from "../../../VUE/api/TareaApi";
import { Task } from "../../../VUE/models/Task";
import { onMounted, ref } from "vue";

const tareas = ref({} as Task);

onMounted(async () => {
    tareas.value = await TareaApi.listar();
});
</script>
