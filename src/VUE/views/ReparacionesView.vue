<template>
    <div v-if="reparacion.id">
        <CardComponent size="col-3">
            <h3 class="my-2 text-uppercase">{{ 'Nº Reparacion: ' + reparacion.numero_reparacion }}</h3>
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
                <button type="button" class="btn btn-info" @click="cambiarPestania('reparacion')">Reparacion</button>
                <button type="button" class="btn btn-info" @click="cambiarPestania('historial')">Datos de
                    Taller</button>
                <button type="button" class="btn btn-info" @click="cambiarPestania('imagen')">Representante</button>
                <button type="button" class="btn btn-info" @click="cambiarPestania('masDatos')">Mas Datos...</button>
            </div>

        </div>
        <div class="col">
            <BotonesCrud @crear="crear(reparacion)" @eliminar="eliminar(reparacion.id)"
                @modificar="modificar(reparacion)" :is-cliente="!!reparacion.id" text='Crear nuevo cliente' />
        </div>
    </div>

    <CardComponent size="">
        <div class="row">
            <div class="col col-lg-4">
                <!-- !METER EL :options -->
                <VueMultiselect v-model="reparacion.empresa" :close-on-select="true" :clear-on-select="false"
                    placeholder="Select one" label="name" track-by="name" />
            </div>
            <div class="col col-lg-4">
                
            </div>
            <div class="col col-lg-4">

            </div>
        </div>
    </CardComponent>
    <div id="vistas">

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
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import { useRoute } from "vue-router";
import { useReparacion } from "@/VUE/composables/useReparaciones";
import CardComponent from "@/VUE/components/helpers/CardComponent.vue";
import BotonesCrud from "@/VUE/components/helpers/BotonesCrudComponent.vue";
import datosCliente from "@/VUE/components/clientes/detalleCliente.vue";
import reparacionComponent from "@/VUE/components/reparaciones/reparaciones.vue";
import historial from "@/VUE/components/reparaciones/historicoReparaciones.vue";
import imagen from "@/VUE/components/reparaciones/imagenReparacion.vue";
import masDatos from "@/VUE/components/reparaciones/masDatosReparacion.vue";

//Estrcuctura Composable

const { reparacion, selector, detalle, nuevaReparacion, cambiarPestania, crear, eliminar, modificar,empresas,talleres } = useReparacion();
/* const { empresas} = useEmpresa();
const {talleres } = useTalleres();
const {clientes} = useCliente(); */
/* !HACER ESTO EN el composable de reparaciones y retornar los clientes*/
const route = useRoute();

onMounted(async () => {
    selector.value = 'reparacion';
    try {
        if (route.params.id) {
            detalle(parseInt(route.params.id as string));
        } else {
            selector.value = 'datosCliente'
            nuevaReparacion()
        }
    } catch (error) {
        console.log("error en la vista de detalle ERROR: " + error);
    }
})

</script>
