<template>
    <!-- MAYBE fix -->
    <div class="px-5" v-if="articulo">
        <CardComponent>
            <div class="row">
                <div class="col col-lg-2 col-md-12 col-sm-12">
                    <span><b>Código</b></span>
                    <div class="input-group mt-2">
                        <input class="form-control form-control-md" type="text" placeholder="Código"
                            v-model="articulo.codigo" id="buscarArticulo">
                        <button class="btn btn-info" @click="buscar(true)">
                            <font-awesome-icon icon="magnifying-glass" />
                        </button>
                    </div>
                </div>

                <div class="col col-lg-4 col-md-12 col-sm-12 justify-content-center align-items-center">
                    <span><b>Descripción</b></span>
                    <textarea class="form-control mt-2" v-model="articulo.descripcion"
                        placeholder="Agrege una breve descripcion del articulo"></textarea>
                </div>

                <div class="col col-lg-3 col-md-12 col-sm-12 justify-content-center">
                    <span><b>Matrícula</b></span>
                    <input class="form-control form-control-md mt-2" type="text" placeholder="Matrícula"
                        v-model="articulo.matricula">
                </div>
                <div class="col col-lg-3 col-md-12 col-sm-12 justify-content-center">
                    <span> <b>Medida</b></span>
                    <input class="form-control form-control-md mt-2" type="number" placeholder="Medida"
                        v-model="articulo.medida">
                </div>
            </div>

            <!-- Progress bar -->
            <div class="progress my-3" role="progressbar" aria-valuenow="100" style="height: 2px">
                <div class="progress-bar w-100 bg-info"></div>
            </div>

            <div class="row">
                <div :class="mainView ? 'col-lg-4 col-md-12 col-sm-12' : 'col-lg-6 col-md-12 col-sm-12'">
                    <p class="m-2"><b>Familia</b></p>
                    <div class="my-2">
                        <VueMultiselect v-model="articulo.familia" :options="secciones" :close-on-select="true"
                            placeholder="Busque una familia" label="nombre" track-by="id" />
                    </div>
                </div>

                <div class="col col-lg-4 col-md-12 col-sm-12" v-if="mainView">
                    <p class="m-2"><b>Proveedor</b></p>
                    <div class="my-2">
                        <VueMultiselect v-model="articulo.proveedor" :options="proveedores" :close-on-select="true"
                            placeholder="Busque un Proveedor" label="nombre_fiscal" track-by="id"
                            data-select="Seleccione Una opcion" />
                    </div>
                </div>

                <div :class="mainView ? 'col-lg-4 col-md-12 col-sm-12' : 'col-lg-6 col-md-12 col-sm-12'">
                    <p class="m-2"><b>Empresa Responsable</b></p>
                    <div class="my-2">
                        <VueMultiselect v-model="articulo.empresa" :options="empresas" :close-on-select="true"
                            placeholder="Busque una Empresa" label="razon_social" track-by="id"
                            data-select="Seleccione Una opcion" />
                    </div>
                </div>
            </div>
            
            <!-- Progress bar -->
            <div class="progress my-3" role="progressbar" aria-valuenow="100" style="height: 2px">
                <div class="progress-bar w-100 bg-info"></div>
            </div>

            <!-- tercera linea -->
            <div class="row mt-4">
                <div class="col-lg-3 col-md-12 col-sm-12 col">
                    <div id="tipo_compra_container">
                        <span><b>Tipo de Compra</b></span>
                        <!-- Se aplica tamaño -->
                        <div class="col-6">
                            <select name="tipo_compra" id="tipo_compra" class="form-select mt-2"
                                v-model="articulo.tipo_compra">
                                <option v-if="articulo.tipo_compra">{{ articulo.tipo_compra }}</option>
                                <option value="">Elija una opción</option>
                                <option value="COMPRA GENERICA">COMPRA GENERICA</option>
                                <option value="COMPRA ONLINE">COMPRA ONLINE</option>
                                <option value="COMPRA HABITUAL">COMPRA HABITUAL</option>
                                <option value="REPUESTO">REPUESTO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col mt-3">
                        <!-- Aplicar tamaño -->
                        <div class="col-8">
                            <span><b>Código de Barras</b></span>
                            <input class="form-control form-control-md mt-2" type="text" v-model="articulo.barcode">
                        </div>
                    </div>

                    <!-- Precio Venta -->
                    <div class="mt-3 col-6">
                        <span><b>Precio Venta</b></span>
                        <div class="input-group mt-2">
                            <input class="form-control form-control-md" type="number" v-model="articulo.precio_venta">
                            <span class="input-group-text">€</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12 col">
                    <span><b>Observaciones</b></span>
                    <textarea class="form-control mt-2 observaciones"
                        placeholder="Añada una observación adicional del artículo" v-model="articulo.observaciones"
                        rows="6"></textarea>
                </div>
            </div>
        </CardComponent>

        <div class="row">
            <div class="col col-10">
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
const { detalle, buscar, empresas } = useArticulos();
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