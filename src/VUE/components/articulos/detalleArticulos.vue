<template>
    <div class="px-5">
        <CardComponent>
            <!-- primera Linea -->
            <div class="row">
                <div class="col col-lg-2 col-md-12 col-sm-12 justify-content-center">
                    <div class="input-group my-4">
                        <span class="input-group-text">Código</span>
                        <input class="form-control form-control-md" type="text" v-model="articulo.codigo">
                    </div>
                </div>
                <div class="col col-lg-6 col-md-12 col-sm-12 justify-content-center align-items-center">
                    <!-- Asegúrate de que el contenedor padre tenga una altura definida -->
                    <div class="input-group my-4 d-flex justify-content-center align-items-center">
                        <!-- Utiliza flexbox para centrar horizontal y verticalmente -->
                        <textarea class="form-control" v-model="articulo.descripcion"
                            placeholder="Descripcion"></textarea>
                    </div>
                </div>

                <div class="col col-lg-2 col-md-12 col-sm-12 justify-content-center">
                    <div class="input-group my-4">
                        <span class="input-group-text">Matrícula</span>
                        <input class="form-control form-control-md" type="text" v-model="articulo.matricula">
                    </div>
                </div>
                <div class="col col-lg-2 col-md-12 col-sm-12 justify-content-center">
                    <div class="input-group my-4">
                        <span class="input-group-text">Medida</span>
                        <input class="form-control form-control-md" type="number" v-model="articulo.medida">
                    </div>
                </div>
            </div>

            <!-- PROGRESS BAR -->
            <div class="progress my-3" role="progressbar" aria-valuenow="100" style="height: 2px">
                <div class="progress-bar w-100 bg-info"></div>
            </div>

            <div class="row">
                <div class="col col-lg-4 col-md-12 col-sm-12">
                    <p class="m-2"><b>Familia</b></p>
                    <div class="my-2">
                        <VueMultiselect v-model="articulo.familia" :options="secciones" :close-on-select="true"
                            placeholder="Busque una familia" label="nombre" track-by="id" />
                    </div>
                </div>

                <div class="col col-lg-4 col-md-12 col-sm-12">
                    <p class="m-2"><b>Proveedor</b></p>
                    <div class="my-2">
                        <VueMultiselect v-model="articulo.proveedor" :options="proveedores" :close-on-select="true"
                            placeholder="Busque un Proveedor" label="nombre_fiscal" track-by="id"
                            data-select="Seleccione Una opcion" />
                    </div>
                </div>
                <div class="col col-lg-4 col-md-12 col-sm-12">
                    <div class="my-2">

                    </div>
                </div>
            </div>

            <!-- PROGRESS BAR -->
            <div class="progress my-3" role="progressbar" aria-valuenow="100" style="height: 2px">
                <div class="progress-bar w-100 bg-info"></div>
            </div>

            <div class="row">
                <div class="col col-lg-6 col-md-12 col-sm-12">
                    <div class="col col-8">
                        <VueMultiselect v-model="articulo.tipo_compra" :options="tipoCompra" />
                    </div>
                    <!-- !Arreglar -->
                    <div class="input-group my-4">
                        <span class="input-group-text">Codigo de Barras</span>
                        <div class="col col-3">
                            <input class="form-control form-control-md" type="text" v-model="articulo.barcode">
                        </div>
                    </div>
                </div>
                <!-- Segunda Col -->
                <div class="col col-lg-6 col-md-12 col-sm-12">
                    <div class="input-group my-4">
                        <span class="input-group-text">Precio Venta</span>
                        <div class="col col-4"> <!-- Modificación aquí -->
                            <input class="form-control form-control-md" type="number" v-model="articulo.precio_venta">
                        </div>
                        <span class="input-group-text">€</span>
                    </div>
                </div>
            </div>

            <p class="text-danger">Añadir radio buttons</p>
            {{ articulo }}
        </CardComponent>

        <div class="row">
            <div class="col col-10">
                <!-- dIV VACIO -->
            </div>
            <div class="col col-2">
                <CardComponent>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch"
                            v-model="articulo.articulo_en_uso">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Articulo En Uso</label>
                    </div>
                </CardComponent>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { onMounted, ref } from "vue";
import type { Articulo } from "../../models/Articulo";
import { useArticulos } from "../../composables/useArticulo";
import { useProveedor } from "../../composables/useProveedor";
import { useSeccion } from "../../composables/useSecciones";
import { useRoute } from "vue-router";
import CardComponent from "../helpers/CardComponent.vue";
import VueMultiselect from 'vue-multiselect';
"../../../node_modules/vue-multiselect/dist/vue-multiselect.css";

const route = useRoute();
const { detalle } = useArticulos();
const { proveedores, cargarProveedores } = useProveedor();
const { secciones, cargarSecciones } = useSeccion();
const tipoCompra = ref([] as String[]);

const props = defineProps({
    articulo: {
        type: Object as () => Articulo,
        required: true,
    },
    mainView: {
        type: Boolean,
        default: true,
    },
});


onMounted(async () => {
    tipoCompra.value = ['COMPRA GENERICA', 'COMPRA ONLINE', 'COMPRA HABITUAL', 'REPUESTO'];
    try {
        cargarSecciones();
        cargarProveedores();
        if (props.mainView) {
            if (route.params.id) {
                detalle(parseInt(route.params.id as string));
            }
        }

    } catch (error) {
        console.log("error en la vista de detalle ERROR: " + error);
    }
})

</script>