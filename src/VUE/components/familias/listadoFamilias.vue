<template>
    <div class="px-5">
        <h1>Familias</h1>
        <div class="row">
            <div class="col-lg-10 col"></div>
            <div class="col-lg-2 col">
                <button type="button" class="btn btn-lg btn-info shadow-lg my-3" @click="nuevaFamilia()">Agregar Familia</button>
            </div>
        </div>
        <CardComponent>
            <table class="table">
                <tr class="encabezado">
                    <th>ID</th>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th>Seccion</th>
                </tr>
                <!-- !Intentar hacer con el el router-link -->
                <tr class="filas" v-for="(item, index) in familias" :key="index" @click="detalle(item.id)">
                    <th class="text-primary">{{ item.id }}</th>
                    <td class="text-uppercase">{{ item.codigo }}</td>
                    <td>{{ item.descripcion_familia }}</td>
                    <td>{{ item.id_seccion }}</td>
                    <td class="eliminar text-center">
                        <button class="btn btn-danger" @click.stop="eliminar(item.id)">
                            <font-awesome-icon icon="trash-can" color="#fff" />
                        </button>
                    </td>
                </tr>
            </table>
        </CardComponent>
    </div>
</template>
click=
<script setup lang="ts">
import { onMounted } from "vue";
import CardComponent from "../helpers/CardComponent.vue"
import { useFamilias } from "../../composables/useFamilias";

const { familias, cargarFamilias, detalle, eliminar,nuevaFamilia } = useFamilias();

onMounted(async () => {
    cargarFamilias();
})

</script>

<style>
.table .eliminar {
    --bs-table-bg: #dc3545;
}

.table th,
.table td {
    border-bottom: 1px solid black;
    padding: 8px;
}

.encabezado {
    border-top: 2px solid black;
    border-bottom: 2px solid black;
}

.filas {
    cursor: pointer;
}

.filas:hover {
    background-color: lightblue;
}
</style>
