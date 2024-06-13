<template>
    <div>
        <CardComponent size="col col-lg-12">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h1>Lineas</h1>
                </div>
                <div class="col-12 col-md-6 text-md-end  mt-3 mt-md-0">
                    <button type="button" class="btn btn-info" @click="aniadirLinea(facturaProveedor)">Añadir
                        Articulo</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-info table-striped">
                    <!-- Encabezado -->

                    <colgroup>
                        <!-- * Nos se ha definido el Tamaño del boton open -->
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 10%;">
                        <col style="width: 5%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Articulo</th>
                            <th>Ref Proveedor</th>
                            <th><!-- nothing--></th>
                            <th>Descripción</th>
                            <th class="text-center">Unidades</th>
                            <th>Peso</th>
                            <th>Precio Unitario</th>
                            <th>Total Linea</th>
                            <th>Margen</th>
                            <th>Precio Coste</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <!-- Contenido -->
                    <tbody>
                        <tr v-for="(linea, index) in facturaProveedor.lineas" :key="index">
                            <td>
                                <div class="col">
                                    <input type="text" v-model="linea.nombre_articulo">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="text" v-model="linea.ref_proveedor" class="text-start">
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#modalArticulos" @click="asignarArticulo(linea)">
                                        <font-awesome-icon icon="up-right-from-square" />
                                    </button>
                                </div>
                            </td>
                            <td>
                                <div class="col">
                                    <input type="textarea" v-model="linea.descripcion">
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
                                    <input type="number" v-model="linea.precio_coste"
                                        @keyup.tab="aniadirLinea(facturaProveedor)">
                                </div>
                            </td>
                            <td class="text-center" @click="eliminarFila(facturaProveedor.lineas, index)">
                                <button type="button" class="btn btn-danger btn-md">
                                    <font-awesome-icon icon="trash-can" />
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            {{ facturaProveedor.lineas }}
        </CardComponent>

        <!-- MODAL -->
        <div class="modal fade modal-bg-dark" id="modalArticulos">
            <div class="modal-dialog modal-dialog-centered custom-modal">
                <div class="modal-content custom-modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Creación de un Artículo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <DetalleArticulo :articulo="articulo" :main-view="false" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import type { FacturasProveedor } from "VUE/models/FacturasProveedor";
import { useFacturaProveedor } from "../../../composables/facturas/useFacturaProveedor";
import CardComponent from "../../helpers/CardComponent.vue";
import DetalleArticulo from "../../articulos/detalleArticulos.vue";
import type { Articulo } from "VUE/models/Articulo";
import type { LineaProveedor } from "VUE/models/LineaProveedor";

// Variables
const { aniadirLinea, eliminarFila, nuevoArticulo } = useFacturaProveedor();
const articulo = ref({} as Articulo);

//Props
const props = defineProps({
    facturaProveedor: {
        type: Object as () => FacturasProveedor,
        required: true
    },
});

//METHODS
const asignarArticulo = (linea: LineaProveedor) => {
    if (linea.articulo == null) {
        nuevoArticulo(linea);
    }
    articulo.value = linea.articulo;
}

</script>


<style scoped>
.table-responsive {
    overflow-x: auto;
}

/* input para definir las tablass */
input {
    border: none;
    border-bottom: 2px solid grey;
    background-color: transparent;
}

.list-enter-active,
.list-leave-active {
    transition: all 0.5s ease;
}

.list-enter-from,
.list-leave-to {
    opacity: 0;
    transform: translateX(30px);
}

.custom-modal {
    max-width: 90%;
    /* Ajusta el ancho según tus necesidades */
}

.custom-modal-content,
.modal-header,
.modal-footer {
    background-color: lightblue;
    border-color: lightblue;
}
</style>
