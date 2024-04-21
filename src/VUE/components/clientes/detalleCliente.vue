<template>
    <CardComponent>
        <h2>Información</h2>
        <div class="progress my-3" role="progressbar" aria-valuenow="100" style="height: 1px">
            <div class="progress-bar w-100 bg-info"></div>
        </div>
        <div class="row text-center">
            <div class="col col-lg-6 col-md-12 col-sm-12 mt-3">
                <div v-if="!cliente.id">
                    <div class="col-5">
                        <div class="input-group my-4 col-4">
                            <span class="input-group-text">Nombre</span>
                            <input class="form-control form-control-md" type="text" v-model="cliente.nombre">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="input-group my-4">
                            <span class="input-group-text">Apellidos</span>
                            <input class="form-control form-control-md" type="text" v-model="cliente.apellidos">
                        </div>
                    </div>
                </div>

                <div class="col-9">
                    <div class="input-group my-4">
                        <span class="input-group-text">Dirección</span>
                        <input class="form-control form-control-md" type="text" v-model="cliente.direccion">
                    </div>
                </div>
                <div class="input-group my-4 col">
                    <span class="input-group-text">Codigo Postal</span>
                    <input type="text" class="form-control col-1" v-model="cliente.cod_postal">
                    <span class="input-group-text">Provincia</span>
                    <input type="text" class="form-control col-3" v-model="cliente.provincia">
                </div>
                <div class="col-4">
                    <div class="input-group">
                        <span class="input-group-text">País</span>
                        <input class="form-control form-control-md" type="text" v-model="cliente.pais">
                    </div>
                </div>
                <!-- Telefonos -->
                <div class="row my-4">
                    <div class="col-5">
                        <div class="input-group">
                            <span class="input-group-text">Teléfono Movil</span>
                            <input class="form-control form-control-md" type="text" v-model="cliente.telefono">
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="input-group">
                            <span class="input-group-text">Teléfono Fijo</span>
                            <input class="form-control form-control-md" type="text" v-model="cliente.telefonoFijo">
                        </div>
                    </div>
                </div>

                <div class="col-8">
                    <div class="input-group">
                        <span class="input-group-text"><font-awesome-icon icon="envelope" /></span>
                        <input class="form-control form-control-md" type="text" v-model="cliente.email"
                            placeholder="ejemplo@ejemplo.com" </div>
                    </div>

                </div>
                <!-- Fin de la primera col -->

                <!-- Switch -->
                <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                    <div class="row col-3 ms-lg-auto my-4">
                        <div class="form-check form-switch" v-if="cliente.id">
                            <input class="form-check-input" type="checkbox" role="switch" v-model="cliente.activo">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Cliente {{ cliente.activo ?
                                'Activo'
                                : 'Desactivado' }}</label>
                        </div>
                    </div>
                    <div class="offset-md-8">
                        <div class="input-group my-4">
                            <span class="input-group-text">DNI</span>
                            <input class="form-control form-control-md" type="text" v-model="cliente.nif">
                        </div>
                    </div>

                    <div class="offset-7">
                        <div class="input-group my-4 col-10">
                            <select v-model="cliente.tipo_cliente" class="form-select">
                                <option value=-1 selected disabled>Tipo de cliente</option>
                                <option value=0>Sin Información</option>
                                <option value=1>Comun</option>
                                <option value=2>Recurrente</option>
                            </select>
                        </div>
                    </div>
                    <div class="offset-8">
                        <div class="input-group my-4 col-10">
                            <span class="input-group-text">Tienda de Referencia</span>
                            <input class="form-control form-control-md" type="number" v-model="cliente.id_empresa"
                                :disabled="!!cliente.id">
                        </div>
                    </div>
                </div>
            </div>
            {{ cliente }}
    </CardComponent>
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import { useCliente } from "../../composables/useCliente";
import { useRoute } from "vue-router";
import CardComponent from "../helpers/CardComponent.vue"

const route = useRoute();
const { detalle, nuevoCliente, } = useCliente();

defineProps({
    cliente: {
        type: Object,
        required: true,
    }
});

onMounted(async () => {
    try {
        if (route.params.id) {
            detalle(parseInt(route.params.id as string));
        }
    } catch (error) {
        console.log("error en la vista de detalle ERROR: " + error);
    }
})

</script>