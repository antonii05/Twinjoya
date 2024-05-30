<template>
    <div class="px-5" v-if="facturasProveedor">
        <h1>Facturas de los proveedores</h1>
        <div class="row align-items-center">
            <div class="col-lg-4 col order-lg-1">
                <div class="input-group">
                    <span class="input-group-text"><font-awesome-icon icon="magnifying-glass" /></span>
                    <input type="text" class="form-control" id="busqueda_1"
                        placeholder="Busca una factura por su numero" @keyup.enter="buscar('busqueda_1')">
                </div>
            </div>
            <div class="col-lg-8 col order-lg-2">
                <button type="button" class="btn btn-lg btn-info shadow-lg my-3"
                    @click="$router.push('/facturas/proveedores/nuevo')">Nueva Factura</button>
            </div>
        </div>

        <CardComponent>
            <table class="table">
                <tr class="encabezado">
                    <th>Numero de factura</th>
                    <th>Fecha Recepción</th>
                    <th>Proveedor</th>
                    <th>Empresa</th>
                </tr>
                <tr class="filas" v-for="(item, index) in facturasProveedor" :key="index"
                    @click="$router.push('/factura/proveedor/informacion/' + item.numero_factura)">
                    <th class="text-primary">{{ item.numero_factura }}</th>
                    <td>{{ item.numero_recepcion }}</td>
                    <td>{{ item.proveedor.nombre_fiscal }}</td>
                    <td>{{ item.empresa.razon_social }}</td>
                    <td class="eliminar text-center">
                        <button class="btn btn-danger" @click.stop="eliminar(item.numero_factura)">
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
import CardComponent from "../../helpers/CardComponent.vue"
import { useFacturaProveedor } from "../../../composables/facturas/useFacturaProveedor";

const { facturasProveedor, eliminar, informacion, cargarFacturas, buscar } = useFacturaProveedor();

onMounted(async () => {
    cargarFacturas();
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
