<template>
    <CardComponent>
        <h2>Informacion Del Proveedor</h2>
        <div class="row">

            <!-- First Column -->
            <div class="col col-lg-6">
                <div class="col-7">
                    <div class="input-group my-4 col-4" v-if="!proveedor.id">
                        <span class="input-group-text">Nombre</span>
                        <input class="form-control form-control-md" type="text" v-model="proveedor.nombre_fiscal">
                    </div>
                </div>
                <div class="col-9">
                    <div class="input-group my-4">
                        <span class="input-group-text">Dirección</span>
                        <input class="form-control form-control-md" type="text" v-model="proveedor.direccion">
                    </div>
                </div>
                <div class="my-4 row">
                    <div class="input-group col-3">
                        <span class="input-group-text">Codigo Postal</span>
                        <input type="number" class="form-control" v-model="proveedor.cod_postal">
                        <span class="input-group-text">Provincia</span>
                        <input type="text" class="form-control" v-model="proveedor.provincia">
                    </div>
                </div>
                <div class="col-3 my-4">
                    <div class="input-group my-4">
                        <span class="input-group-text">País</span>
                        <input class="form-control form-control-md" type="text" v-model="proveedor.pais">
                    </div>
                </div>
                <!-- Teelfonos -->
                <div class="input-group col-3 my-4">
                    <span class="input-group-text">Teléfono 1</span>
                    <input type="text" class="form-control" v-model="proveedor.telefono1">
                    <span class="input-group-text">Teléfono 2</span>
                    <input type="text" class="form-control" v-model="proveedor.telefono2">
                </div>

                <div class="col-6 my-4">
                    <div class="input-group">
                        <span class="input-group-text"><font-awesome-icon icon="envelope" /></span>
                        <input class="form-control form-control-md" type="text" v-model="proveedor.email"
                            placeholder="ejemplo@ejemplo.com">
                    </div>
                </div>

                <div class="col-8 my-4">
                    <div class="input-group">
                        <span class="input-group-text"><font-awesome-icon icon="globe" /></span>
                        <input class="form-control form-control-md" type="text" v-model="proveedor.web"
                            placeholder="https://paginaweb.com">
                    </div>
                </div>

            </div>


            <!-- Second Column -->
            <div class="col col-lg-6">

                <!-- SWITCH -->
                <div class="row col-3 col ms-lg-auto">
                    <div class="form-check form-switch my-4" v-if="proveedor.id">
                        <input class="form-check-input" type="checkbox" role="switch" v-model="proveedor.activo">
                        <label class="form-check-label">Proveedor {{ proveedor.activo ?
                            'Activo'
                            : 'Inactivo' }}</label>
                    </div>
                </div>

                <div class="col-3 ms-auto" v-if="!proveedor.id">
                    <div class="input-group my-4">
                        <span class="input-group-text">Codigo</span>
                        <input type="text" class="form-control form-control-md text-uppercase" v-model="proveedor.codigo">
                    </div>
                </div>

                <div class="col-3 col ms-auto">
                    <div class="input-group my-4">
                        <span class="input-group-text">CIF / NIF</span>
                        <input class="form-control form-control-md" type="text" v-model="proveedor.cif">
                    </div>
                </div>

                <div class="col-5 ms-auto" v-if="proveedor.fecha_alta">
                    <div class="input-group my-4">
                        <span class="input-group-text">Ultima Modificacion</span>
                        <input type="datetime-local" class="form-control form-control-md"
                            v-model="proveedor.fecha_modificacion" disabled>
                    </div>
                </div>
                <div class="col-5 ms-auto" v-if="proveedor.fecha_alta">
                    <div class="input-group my-4">
                        <span class="input-group-text">Dado de Alta</span>
                        <input type="datetime-local" class="form-control form-control-md"
                            v-model="proveedor.fecha_modificacion" disabled>
                    </div>
                </div>

                <div class="ms-auto col-4">
                    <div class="input-group">
                        <label for="id_empresa" class="text-success">* Tienda 1 por defecto</label>
                        <span class="input-group-text">Tienda de Referencia</span>
                        <input class="form-control form-control-md" type="number" id="id_empresa" v-model="proveedor.id_empresa"
                        :disabled="!!proveedor.id">
                    </div>
                </div>


            </div>
        </div>
    </CardComponent>
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import CardComponent from "../helpers/CardComponent.vue";
import type { Proveedor } from "../../models/Proveedor";


defineProps(
    {
        proveedor: {
            type: Object as () => Proveedor,
            required: true,
        }
    });

//posible async
onMounted(() => {

});
</script>