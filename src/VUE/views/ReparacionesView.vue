<template>
    <div class="row main">

        <div v-if="reparacion.id">
            <CardComponent size="col-3">
                <h3 class="my-2 text-uppercase">{{ 'Nº Reparacion: ' + reparacion.id }}</h3>
            </CardComponent>
        </div>

        <div v-if="!reparacion.id">
            <CardComponent size="col-5">
                <h1 class="text-center">Creación del la Reparacion</h1>
            </CardComponent>
        </div>

        <div class="row">
            <div class="col-lg-10">
                <div class="btn-group my-3" role="group">
                    <button type="button" class="btn btn-info" @click="cambiarPestania('datosCliente')">Datos
                        Cliente</button>
                    <button type="button" class="btn btn-info"
                        @click="cambiarPestania('reparacion')">Reparacion</button>
                    <button type="button" class="btn btn-info" @click="cambiarPestania('historial')">Datos de
                        Taller</button>
                    <button type="button" class="btn btn-info" @click="cambiarPestania('imagen')">Representante</button>
                    <button type="button" class="btn btn-info" @click="cambiarPestania('masDatos')">Mas
                        Datos...</button>
                </div>

            </div>
            <div class="col">
                <BotonesCrud @crear="crear(reparacion)" @eliminar="eliminar(reparacion.id)"
                    @modificar="modificar(reparacion)" :is-cliente="!!reparacion.id" text='Crear la Reparación' />
            </div>
        </div>

        <div class="px-5">
            <CardComponent style="z-index: 1;">
                <div class="row">
                    <!-- Empresas -->
                    <div class="col col-lg-4">
                        <span class="p-1"> <b>Empresa Responsable</b> </span>
                        <div class="mt-3">
                            <VueMultiselect v-model="reparacion.empresa" :options="empresas" :close-on-select="true"
                                placeholder="Busque una Empresa" label="razon_social" track-by="id"
                                data-select="Seleccione Una opcion" :disabled="!isNew" />
                        </div>
                    </div>
                    <!-- Clientes -->
                    <div class="col col-lg-4">
                        <span class="p-1"> <b>Cliente</b> </span>
                        <div class="mt-3">
                            <VueMultiselect v-model="reparacion.cliente" :options="clientes" :close-on-select="true"
                                placeholder="Intente buscar un Cliente" label="nombre" track-by="id"
                                data-select="Seleccione Una opcion" :disabled="!isNew" />
                        </div>
                    </div>
                    <!-- Taller -->
                    <div class="col col-lg-4">
                        <span class="p-1"> <b>Taller Asociado</b> </span>
                        <div class="mt-3">
                            <VueMultiselect v-model="reparacion.taller" :options="talleres" :close-on-select="true"
                                placeholder="Busque una Empresa" label="nombre" track-by="id"
                                data-select="Seleccione Una opcion" :disabled="!isNew" />
                        </div>
                    </div>
                    <!-- Fin de la ROW GLOBAL -->

                </div>
            </CardComponent>
        </div>

        <div id="vistas">
            <!-- Componentes adicionales -->
            <div>
                <div class="datosCliente" v-if="selector == 'datosCliente'">
                    <datosCliente :cliente="reparacion.cliente" />
                </div>

                <div class="reparacion" v-if="selector == 'reparacion'">
                    <reparacionComponent :reparacion="reparacion" />
                </div>

                <div class="historial" v-if="selector == 'historial'">
                    <historial :reparacion="reparacion" />
                </div>

                <div class="imagen" v-if="selector == 'imagen'">
                    <imagen :reparacion="reparacion" />
                </div>

                <div class="masDatos" v-if="selector == 'masDatos'">
                    <masDatos :reparacion="reparacion" />
                </div>
            </div>
        </div>
    </div>
    {{ reparacion }}
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import { useRoute } from "vue-router";
import VueMultiselect from 'vue-multiselect'
import { useReparacion } from "@/VUE/composables/useReparaciones";
import CardComponent from "@/VUE/components/helpers/CardComponent.vue";
import BotonesCrud from "@/VUE/components/helpers/BotonesCrudComponent.vue";
import datosCliente from "@/VUE/components/clientes/detalleCliente.vue";
import reparacionComponent from "@/VUE/components/reparaciones/reparaciones.vue";
import historial from "@/VUE/components/reparaciones/historicoReparaciones.vue";
import imagen from "@/VUE/components/reparaciones/imagenReparacion.vue";
import masDatos from "@/VUE/components/reparaciones/masDatosReparacion.vue";

//Estrcuctura Composable
const { reparacion, selector, detalle, nuevaReparacion, cambiarPestania, crear, eliminar, modificar, empresas, talleres, clientes, isNew } = useReparacion();

//Constantes
const route = useRoute();

//Functiones
onMounted(async () => {
    selector.value = 'reparacion';
    try {
        if (route.params.id) {
            detalle(parseInt(route.params.id as string));
        } else {
            nuevaReparacion()
        }
    } catch (error) {
        console.log("error en la vista de detalle ERROR: " + error);
    }
})

</script>

<style src="../../../node_modules/vue-multiselect/dist/vue-multiselect.css"></style>
