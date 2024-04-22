<template>
    <div class="px-5">
        <h1>Proveedores</h1>
        <div class="row">
            <div class="col-lg-10 col"></div>
            <div class="col-lg-2 col">
                <button type="button" class="btn btn-lg btn-info shadow-lg my-3" @click="nuevoProveedor()">Crear un
                    Proveedor</button>
            </div>
        </div>
        <CardComponent>
            <table class="table">
                <tr class="encabezado">
                    <th>ID</th>
                    <th>Nombre Fiscal</th>
                    <th>CIF</th>
                    <th>Provincia</th>
                    <th>Direccion</th>
                </tr>
                <tr class="filas" v-for="(item, index) in proveedores" :key="index" @click="detalle(item.id)">
                    <th class="text-primary">{{ item.id }}</th>
                    <td>{{ item.nombre_fiscal }}</td>
                    <td>{{ item.cif }}</td>
                    <td>{{ item.provincia }}</td>
                    <td>{{ item.direccion }}</td>
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
import { useProveedor } from "../../composables/useProveedor";

const { proveedores, cargarProveedores, detalle, eliminar, nuevoProveedor } = useProveedor();

onMounted(async () => {
    cargarProveedores();
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
