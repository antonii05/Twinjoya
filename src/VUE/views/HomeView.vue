<template>
    <div class="row" id="home" v-if="tareas">
        <h1>Home</h1>
        <div class="card col-2 col my-3 mr-3 text-center">
            <div class="card-header">
                <span>Este es el Header</span>
            </div>
            <div class="card-body">
                <span>Este es el Body</span>
            </div>
        </div>
        <br>
        <div class="card col-2 col my-3 text-center">
            <div class="card-header">
                <span>Este es el Header</span>
            </div>
            <div class="card-body">
                <span>Este es el Body</span>
            </div>
        </div>
        <br>
        <div class="card col-2 col my-3 text-center">
            <div class="card-header">
                <span>Este es el Header</span>
            </div>
            <div class="card-body">
                <span>Este es el Body</span>
            </div>
        </div>
        <br>
        <div class="card col-2 col my-3 text-center">
            <div class="card-header">
                <span>Este es el Header</span>
            </div>
            <div class="card-body">
                <span>Este es el Body</span>
            </div>
        </div>
        <br>
        <div class="card col-2 col my-3">
            <div class="card-header">
                <span>Este es el Header</span>
            </div>
            <div class="card-body">
                <span>Este es el Body</span>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import TareaApi from "@/VUE/api/TareaApi";
import type { Task } from "@/VUE/models/Task";
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


<style>
#home{
    margin-left: 20mm;
    display: flex;
}
</style>