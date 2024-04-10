<template>
    <h1>Home</h1>
    {{ tareas }}
</template>

<script setup lang="ts">
import TareaApi from "../../../VUE/api/TareaApi";
import { Task } from "../../../VUE/models/Task";
import { onMounted, ref } from "vue";
import draggable from "vuedraggable";

const tareas = ref({} as Task[]);
const tarea = ref({} as Task);

onMounted(async () => {
    try {
        tareas.value = await TareaApi.getTareas();
    } catch (error) {
        console.log("No se ha podido realizar las peticiones a la Api");
    }
});
</script>
