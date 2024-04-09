<template>
    <h1>Home</h1>
    <draggable v-model="list" group="people" @end="onDragEnd">
        <template #item="{ element, index }">
            <div class="item">
                {{ element.name }}
            </div>
        </template>
    </draggable>
</template>

<script setup lang="ts">
import TareaApi from "../../../VUE/api/TareaApi";
import { Task } from "../../../VUE/models/Task";
import { onMounted, ref } from "vue";
import draggable from "vuedraggable";

const tareas = ref({} as Task[]);
const tarea = ref({} as Task);
const list = [
    { name: "Elemento 1" },
    { name: "Elemento 2" },
    { name: "Elemento 3" },
    { name: "Elemento 4" },
    { name: "Elemento 5" },
];

onMounted(async () => {
    try {
        tareas.value = await TareaApi.getTareas();
    } catch (error) {
        console.log("No se ha podido realizar las peticiones a la Api");
    }
});

const onDragEnd = (event) => {
    console.log("Elemento arrastrado hasta:", event.newIndex);
};

const detalle = async (id: number) => {
    tarea.value = await TareaApi.detalleTarea(id);
};
</script>
