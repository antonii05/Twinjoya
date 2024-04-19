<template>
    <div class="px-5">
        <h1>Clientes</h1>
        <CardComponent>
            <table class="table">
                <tr class="encabezado">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Cod Postal</th>
                    <th>Teléfono</th>
                    <th>NIF</th>
                </tr>
                <tr class="filas" v-for="cliente in clientes" @click="detalle(cliente.id)">
                    <th class="text-primary">{{ cliente.id }}</th>
                    <td>{{ cliente.nombre }}</td>
                    <td>{{ cliente.apellidos }}</td>
                    <td>{{ cliente.cod_postal }}</td>
                    <td>{{ cliente.telefono }}</td>
                    <td>{{ cliente.nif }}</td>
                </tr>
            </table>
        </CardComponent>
    </div>
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import { useCliente } from "../../composables/useCliente";
import CardComponent from "../helpers/CardComponent.vue"

const { clientes, cargarClientes, detalle } = useCliente();

onMounted(async () => {
    cargarClientes();
})

</script>

<style>
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
