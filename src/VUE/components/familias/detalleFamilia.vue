<template>
    <div class="row">
        <!-- *Div Vacio -->
        <div class="col col-lg-1"></div>
        <CardComponent size="col">
            <h1>Información Familia</h1>

            <!-- PROGRESS BAR -->
            <div class="progress my-3" role="progressbar" aria-valuenow="100" style="height: 2px">
                <div class="progress-bar w-100 bg-info"></div>
            </div>

            <!-- Primera Fila -->
            <div class="row ">

                <!-- !cambiar el tamñao de las 3 columnas para que la Descripccion ocupe mas -->
                <div class="col col-lg-4 d-flex justify-content-center">
                    <div class="col-6 col">
                        <div class="input-group my-4">
                            <span class="input-group-text">Código</span>
                            <input class="form-control form-control-md" type="text" v-model="familia.codigo">
                        </div>
                    </div>
                </div>

                <div class="col col-lg-4 d-flex justify-content-center">
                    <div class="col-6 col my-3">
                        <textarea cols="35" rows="2 " class="form-control form-control-md"
                            v-model="familia.descripcion_familia" placeholder="Descripción"></textarea>
                    </div>
                </div>

                <div class="col col-lg-4 d-flex justify-content-center">
                    <div class="col-6 col my-4">
                        Añadir VueMultiselect
                    </div>
                </div>
            </div>

            <!-- PROGRESS BAR -->
            <div class="progress" role="progressbar" aria-valuenow="100" style="height: 1px">
                <div class="progress-bar w-100 bg-info"></div>
            </div>

            <!-- 2ª Fila -->
            <div class="row mt-3">

                <div class="col col-lg-3 d-flex justify-content-center my-3">
                    <VueMultiselect v-model="familia.unidad_medida" :options="unidadesMedida"
                        placeholder="Seleccione una opcion" :close-on-select="true" >
                    </VueMultiselect>
                </div>

                <div class="col col-lg-3 d-flex justify-content-center">
                    <div class="input-group my-3">
                        <span class="input-group-text">Texto Etiqueta</span>
                        <input class="form-control form-control-md" type="text" v-model="familia.texto_etiqueta">
                    </div>
                </div>

                <div class="col col-lg-3 d-flex justify-content-center">
                    <div class="col-8 col">
                        <div class="input-group my-3">
                            <span class="input-group-text">Contador</span>
                            <input class="form-control form-control-md" type="number" v-model="familia.contador">
                        </div>
                    </div>
                </div>

                <div class="col col-lg-3 d-flex justify-content-center">
                    <div class="col col-7">

                        <div class="input-group my-3">
                            <span class="input-group-text">Desc Especial</span>
                            <input class="form-control form-control-md text-center" type="number"
                                v-model="familia.descuento">
                        </div>
                    </div>
                </div>

            </div>

            <!-- PROGRESS BAR -->
            <div class="progress my-2" role="progressbar" aria-valuenow="100" style="height: 1px">
                <div class="progress-bar w-100 bg-info"></div>
            </div>

            <div class="row">
                <div class="col col-lg-6 d-flex justify-content-center">
                    hola
                </div>
                
                <div class="col col-lg-6 d-flex justify-content-center">
                    Mundo
                </div>
            </div>
        </CardComponent>

        <!-- *DIV VACIO -->
        <div class="col col-lg-1"></div>
    </div>

</template>

<script setup lang="ts">
import CardComponent from "../helpers/CardComponent.vue";
import type { Familia } from "../../models/Familia";
import VueMultiselect from 'vue-multiselect'

const unidadesMedida = ['pulgadas', 'milímitros', 'centímetros'];

defineProps({
    familia: {
        type: Object as () => Familia,
        required: true
    }
});
</script>

<style src="../../../node_modules/vue-multiselect/dist/vue-multiselect.css"></style>
