<template>
    <div class="px-5">
        <h1>Clientes</h1>
        <div class="row">
            <div class="col-lg-10 col"></div>
            <div class="col-lg-2 col">
                <button type="button" class="btn btn-lg btn-info shadow-lg my-3" @click="nuevoCliente()">Crear un Cliente</button>
            </div>
        </div>
        <CardComponent>
            <table class="table">
                <tr class="encabezado">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Provincia</th>
                    <th>Cod Postal</th>
                    <th>Teléfono</th>
                    <th>NIF</th>
                </tr>
                <!-- !Intentar hacer con el el router-link -->
                <tr class="filas" v-for="(cliente, index) in clientes" :key="index" @click="detalle(cliente.id)">
                    <th class="text-primary">{{ cliente.id }}</th>
                    <td>{{ cliente.nombre + ' '+ cliente.apellidos}}</td>
                    <td>{{ cliente.provincia }}</td>
                    <td>{{ cliente.cod_postal }}</td>
                    <td>{{ cliente.telefono }}</td>
                    <td>{{ cliente.nif }}</td>
                    <td class="eliminar text-center">
                        <button class="btn btn-danger" @click.stop="eliminar(cliente.id)">
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
import { useCliente } from "../../composables/useCliente";
import CardComponent from "../helpers/CardComponent.vue"

const { clientes, cargarClientes, detalle, eliminar,nuevoCliente } = useCliente();

onMounted(async () => {
    cargarClientes();
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
