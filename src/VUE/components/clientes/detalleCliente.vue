<template>
    <CardComponent>
        <h1>Información</h1>
        <div class="progress my-3" role="progressbar" aria-valuenow="100" style="height: 1px">
            <div class="progress-bar w-100 bg-info"></div>
        </div>
        <!--  -->
        <div class="row text-center">
            <div class="col col-lg-6 col-md-12 col-sm-12 mt-3">
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
                        <input class="form-control form-control-md" type="text" v-model="cliente.email">
                    </div>
                </div>

            </div>
            <!-- Fin de la primera col -->

            <!-- Switch -->
            <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
                <div class="row col-3 ms-lg-auto my-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" v-model="cliente.activo">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Cliente {{ cliente.activo ?
                            'Activo'
                            : 'Desactivado' }}</label>
                    </div>
                </div>
                <div class="offset-md-4">
                    <div class="input-group my-4">
                        <span class="input-group-text">DNI</span>
                        <input class="form-control form-control-md" type="text" v-model="cliente.nif">
                    </div>
                </div>

                <div class="offset-8">
                    <div class="input-group my-4 col-10">
                        <span class="input-group-text">Tipo Cliente</span>
                        <input class="form-control form-control-md" type="number" v-model="cliente.tipo_cliente">
                    </div>
                </div>
                <div class="offset-8">
                    <div class="input-group my-4 col-10">
                        <span class="input-group-text">Tienda de Referencia</span>
                        <!-- ! Agregar v-model="cliente.id_Tienda" -->
                        <!-- ! Cambiar migraciones de cliente -->
                        <input class="form-control form-control-md" type="number">
                    </div>
                </div>
            </div>

        </div>
    </CardComponent>
    {{ cliente }}
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import { useCliente } from "../../composables/useCliente";
import { useRoute } from "vue-router";
import CardComponent from "../helpers/CardComponent.vue"

const route = useRoute();
const { cliente, detalle } = useCliente();

onMounted(() => {
    try {
        detalle(parseInt(route.params.id as string));
    } catch (error) {
        console.log("error en la vista de detalle ERROR: " + error);
    }
})

</script>