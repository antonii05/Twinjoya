<template>
    <div>
        <CardComponent size="col col-lg-12">
            <h1>Lineas</h1>
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
                            <th>Tienda</th>
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
                        <tr>
                            <td>
                                <div class="col">
                                    <input type="text">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="text">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="text">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="text">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="text">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="text">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="text">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="text">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="text">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="text">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </CardComponent>
    </div>
</template>

<script setup lang="ts">
//import { ref, onMounted } from "vue";
import CardComponent from "../../helpers/CardComponent.vue";
</script>

<style scoped>
.table-responsive {
    overflow-x: auto;
}

input {
    border: none;
    background-color: transparent;
}
</style>
