<template>
    <div class="container-fluid">
        <div>
            <CardComponent size="col-5">
                <h1>Factura Proveedor {{ facturaProveedor.numero_factura }}</h1>
                <h6>Meter Informacion del empleaado que le ha dado de alta</h6>
            </CardComponent><br>
            <br>
            {{ }}
        </div>

        <div v-if="!facturaProveedor.numero_factura">
            <CardComponent size="col-3">
                <h1 class="text-center">Creación del Cliente</h1>
            </CardComponent>
        </div>

        <div class="row">
            <div class="col-lg-10">
                <div class="btn-group my-3" role="group">
                    <button type="button" class="btn btn-info" @click="cambiarPestania('cabecera')">Cabecera</button>
                    <button type="button" class="btn btn-info" @click="cambiarPestania('otrosCostes')">Otros
                        Costes</button>

                    <button type="button" class="btn btn-info" @click="cambiarPestania('lineas')">Lineas</button>
                    <button type="button" class="btn btn-info" @click="cambiarPestania('pie')">Pie</button>
                    <button type="button" class="btn btn-info"
                        @click="cambiarPestania('vencimientos')">Vencimientos</button>
                </div>

            </div>
            <div class="col">
                <BotonesCrud :is-cliente="!!facturaProveedor.numero_factura" @crear="crear(facturaProveedor)"
                    @eliminar="eliminar(facturaProveedor.numero_factura)" @modificar="update(facturaProveedor)"
                    text='Crear nuevo cliente' />
            </div>
        </div>

        <CardComponent style="z-index: 1;">
            <div class="row">
                <!-- Empresas -->
                <div class="col col-lg-3">
                    <span class="p-1"> <b>Empresa Responsable</b> </span>
                    <div class="mt-3">
                        <VueMultiselect v-model="facturaProveedor.empresa" :options="empresas" :close-on-select="true"
                            placeholder="Busque una Empresa" label="razon_social" track-by="id"
                            data-select="Seleccione Una opcion" :disabled="!isNew" />
                    </div>
                </div>
                <!-- Numero recepcion -->
                <div class="col col-lg-3 text-center justify-content-center d-flex">
                    <div class="row">
                        <b>Número de recepción </b>
                        <input type="text" placeholder="Número de recepción" class="form-control text-center"
                            v-model="facturaProveedor.numero_recepcion" :disabled="!isNew">
                    </div>
                </div>

                <!-- FECHA RECEPCION -->
                <div class="col col-lg-3 text-center justify-content-center d-flex">
                    <div class="row">
                        <b>Fecha de recepción </b>
                        <input type="date" class="form-control text-center" placeholder="Fecha de recepción"
                            v-model="facturaProveedor.fecha_factura" :disabled="!isNew">
                    </div>
                </div>

                <!-- Proveedores -->
                <div class="col col-lg-3">
                    <span class="p-1"> <b>Proveedores</b> </span>
                    <div class="mt-3">
                        <VueMultiselect v-model="facturaProveedor.proveedor" :options="proveedores"
                            :close-on-select="true" placeholder="Busque un Proveedor" label="nombre_fiscal"
                            track-by="id" data-select="Seleccione Una opcion" :disabled="!isNew" />
                    </div>
                </div>
                <!-- Fin de la ROW GLOBAL -->

            </div>
        </CardComponent>

        <div id="vistas">
            <div class="informacion" v-if="selector == 'cabecera'">
                <CabeceraProveedor :factura-proveedor="facturaProveedor" />
            </div>

            <div class="otrosCostes" v-if="selector == 'otrosCostes'">
                <CostesProveedor :factura-proveedor="facturaProveedor" />
            </div>

            <div class="lineas" v-if="selector == 'lineas'">
                <LineasProveedor/>
            </div>

            <div class="pie" v-if="selector == 'pie'">
                <PieProveedor :factura-proveedor="facturaProveedor" />
            </div>

            <div class="vencimientos" v-if="selector == 'vencimientos'">
                <VencimientosProveedor :factura-proveedor="facturaProveedor" />
            </div>

        </div>
    </div>
    {{ facturaProveedor }}
</template>


<script setup lang="ts">
import { onMounted } from "vue";
import { useRoute } from "vue-router";
import CardComponent from "../../components/helpers/CardComponent.vue";
import VueMultiselect from "vue-multiselect";
import "../../../node_modules/vue-multiselect/dist/vue-multiselect.css"
import BotonesCrud from "../../components/helpers/BotonesCrudComponent.vue";
import { useFacturaProveedor } from "../../composables/facturas/useFacturaProveedor";
import CabeceraProveedor from "../../components/facturas/proveedores/CabeceraProveedor.vue";
import CostesProveedor from "../../components/facturas/proveedores/CostesProveedor.vue";
import LineasProveedor from "../../components/facturas/proveedores/LineasProveedor.vue";
import PieProveedor from "../../components/facturas/proveedores/PieProveedor.vue";
import VencimientosProveedor from "../../components/facturas/proveedores/VencimientosProveedor.vue";


//Estrcuctura Composable
const { facturaProveedor, selector, cambiarPestania, informacion, nuevaFactura, eliminar, crear, update, isNew, empresas, proveedores } = useFacturaProveedor();
const route = useRoute();

onMounted(async () => {
    try {
        if (route.name === 'facturasProveedoresInformacion') {
            informacion(parseInt(route.params.id as string))
        } else {
            nuevaFactura();
        }
    } catch (error) {
        console.log("error en la vista de cabecera ERROR: " + error);
    }
})

</script>