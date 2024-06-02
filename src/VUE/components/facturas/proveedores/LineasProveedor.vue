<template>
    <div>
        <CardComponent size="col col-lg-12">
            <div class="row">
                <h1>Lineas</h1>
                <button type="button" class="btn btn-info" @click="aniadirLinea(facturaProveedor)">Añadir Articulo</button>
            </div>
            <div class="table-responsive">
                <table class="table table-info table-striped">
                    <!-- Encabezado -->

                    <colgroup>
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Articulo</th>
                            <th>Ref Proveedor</th>
                            <th>Descripción</th>
                            <th>Empresa</th>
                            <th class="text-center">Unidades</th>
                            <th>Peso</th>
                            <th>Precio Unitario</th>
                            <th>Total Linea</th>
                            <th>Margen</th>
                            <th>Precio Coste</th>
                        </tr>
                    </thead>
                    <!-- Contenido -->
                    <tbody>
                        <tr v-for="linea in facturaProveedor.lineas">
                            <td>
                                <div class="col">
                                    <input type="text" v-model="linea.nombre_articulo">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="text" v-model="linea.ref_proveedor">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="textarea" v-model="linea.descripcion">
                                </div>
                            </td>
                            <td>
                                <!-- Empresa -->
                                <div class="col">
                                    <!-- !CAMBIAR POR VUEMULTISELECT -->
                                    <input type="text">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="number" v-model="linea.unidades">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="number" v-model="linea.peso">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="number" v-model="linea.precio_unitario">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="number" v-model="linea.total_linea">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="number" v-model="linea.margen">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="number" v-model="linea.precio_coste">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{ facturaProveedor.lineas }}
        </CardComponent>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";
import type { FacturasProveedor } from "VUE/models/FacturasProveedor";
import { useFacturaProveedor } from "../../../composables/facturas/useFacturaProveedor";
import CardComponent from "../../helpers/CardComponent.vue";

const { aniadirLinea } = useFacturaProveedor();

const props = defineProps({
    facturaProveedor: {
        type: Object as () => FacturasProveedor,
        required: true
    },
});
</script>


<style scoped>
.table-responsive {
    overflow-x: auto;
}

input {
    border: none;
    border-bottom: 2px solid grey;
    background-color: transparent;
}
</style>
