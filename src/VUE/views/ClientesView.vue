<template>
    <h1>Cliente: {{ cliente.nombre + ' '+cliente.apellidos}}</h1>
    <h6>Meter Informacion del empleaado que le ha dado de alta</h6>
    <div class="btn-group my-3" role="group">
        <button type="button" class="btn btn-primary" @click="cambiarPestania('detalle')">Información</button>
        <button type="button" class="btn btn-primary" @click="cambiarPestania('facturacion')">Datos Facturación</button>
        <button type="button" class="btn btn-primary" @click="cambiarPestania('facturacion')">Fechas Señaladas</button>
        <button type="button" class="btn btn-primary">Code..</button>
    </div>
    <div id="vistas">
        <div class="informacion" v-if="selector == 'detalle'">
            <detalleCliente />
        </div>

        <div class="datosFacturacion" v-if="selector == 'facturacion'">
            <datosFacturacion />
        </div>

        <!-- MORE CODE HERE -->
    </div>
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import { useRoute } from "vue-router";
import { useCliente } from "@/VUE/composables/useCliente";
import detalleCliente from "@/VUE/components/clientes/detalleCliente.vue";
import datosFacturacion from "@/VUE/components/clientes/datosFacturacion.vue";

//Estrcuctura Composable
const { selector, cambiarPestania,detalle,cliente } = useCliente();

const route = useRoute();

onMounted(async () => {
    selector.value = 'detalle';
    try {
        detalle(parseInt(route.params.id as string));
    } catch (error) {
        console.log("error en la vista de detalle ERROR: " + error);
    }
})

</script>