<template>

    <CardComponent size="col">
        <h1>Configuración Adicional de las Familias</h1>
    </CardComponent>

    <div class="row">
        <div class="cartas" style="display: flex; flex-wrap: wrap;">
            <div class="col-3 col carta-container" v-for="(item, index) in secciones" :key="index">
                <div class="card" style="width: 100%;">
                    <div class="card-header text-uppercase">
                        {{ item.nombre }}
                    </div>
                    <div class="card-body">
                        <div class="col col-6">
                            <h5 class="card-title">Nombre</h5>
                            <input type="text" class="d-flex form-control form-control-md text-uppercase" placeholder="Nombre Familia"
                            v-model="item.nombre">
                        </div>
                        <div class="col col-4 mt-2">
                            <h5 class="card-title">Prefijo</h5>
                            <input type="text" class="d-flex form-control form-control-md text-uppercase" placeholder="Abreviacion..."
                                v-model="item.prefijo">
                        </div>
                        <div class="col col-10 mt-2">
                            <h5 class="card-text">Descripción</h5>
                            <textarea class="form-control form-control" v-model="item.descripcion"></textarea>
                        </div>
                        <div class="row">
                            <div class="col col-5 mt-3 offset-">
                                <a @click="eliminar(item.id,index)" class="btn btn-danger"><font-awesome-icon
                                        icon="trash-can" /> Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

    <!-- Fin del bucle -->

    <div class="col-3">
        <button class="btn btn-info w-100 mt-3 text-uppercase" @click=agregarSeccion()><font-awesome-icon icon="plus" />
            Agregar</button>

        <button class="btn btn-warning w-100 mt-3 text-uppercase" @click=modificar(secciones)><font-awesome-icon
                icon="pen-ruler" />
            modificar secciones</button>
    </div>
</template>

<script setup lang="ts">
import { useSeccion } from '../../composables/useSecciones';
import CardComponent from '../../components/helpers/CardComponent.vue';
import { onMounted } from 'vue';

const { secciones, cargarSecciones, modificar, eliminar, agregarSeccion } = useSeccion();


onMounted(async () => {
    cargarSecciones();
})
</script>

<style>
.card {
    background-color: rgb(185, 247, 255);
}

.card-header {
    background-color: rgb(140, 240, 253);
}

.carta-container {
    margin-right: 10px;
    /* Espacio entre cada carta */
}
</style>