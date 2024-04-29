<template>
    <div class="row">
        <!-- *Div Vacio -->
        <div class="col col-lg-1"></div>
        <CardComponent size="col">
            <h1>Información Familia</h1>

            <!-- PROGRESS BAR -->
            <div class="progress my-3" role="progressbar" aria-valuenow="100" style="height: 1px">
                <div class="progress-bar w-100 bg-info"></div>
            </div>

            <!-- Primera Fila -->
            <div class="row ">

                <!-- !cambiar el tamñao de las 3 columnas para que la Descripccion ocupe mas -->
                <div class="col col-lg-4 d-flex justify-content-center">
                    <div class="col-8 col">
                        <div class="input-group my-4">
                            <span class="input-group-text">Código</span>
                            <input class="form-control form-control-md" type="text" v-model="familia.codigo">
                        </div>
                    </div>
                </div>

                <div class="col col-lg-4 d-flex justify-content-center">
                    <div class="my-3">
                        <textarea cols="35" rows="2 " class="form-control form-control-md"
                            placeholder="Descripción"></textarea>
                    </div>
                </div>

                <div class="col col-lg-4 d-flex justify-content-center">
                    <div class="my-4 col-10">
                        <VueMultiselect v-model="familia.unidad_medida" :options="unidadesMedida" placeholder="Medida: "
                            :close-on-select="true"></VueMultiselect>
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
                    <VueMultiselect v-model="familia.unidad_medida" :options="unidadesMedida" placeholder="Medida: "
                        :close-on-select="true">
                    </VueMultiselect>
                </div>

                <div class="col col-lg-3 d-flex justify-content-center">
                    <div class="input-group my-3">
                        <span class="input-group-text">Texto Etiqueta</span>
                        <input class="form-control form-control-md" type="text" v-model="familia.texto_etiqueta">
                    </div>
                </div>

                <div class="col col-lg-3 d-flex justify-content-center">
                    <div class="input-group my-3">
                        <span class="input-group-text">Contador</span>
                        <input class="form-control form-control-md" type="number" v-model="familia.contador">
                    </div>
                </div>

                <div class="col col-lg-3 d-flex justify-content-center">

                    <div class="input-group my-3">
                        <span class="input-group-text">Desc Especial</span>
                        <input class="form-control form-control-md text-center" type="number"
                            v-model="familia.descuento">
                    </div>
                </div>
            </div>

            <!-- PROGRESS BAR -->
            <div class="progress my-2" role="progressbar" aria-valuenow="100" style="height: 1px">
                <div class="progress-bar w-100 bg-info"></div>
            </div>

            <div class="row">
                <!-- Priemra Columuna -->
                <div class="col col-lg-6 col-md-12 col-sm-12">
                    <div class="offset-2">
                        <h4 class="mt-2 mb-4 d-flex justify-content-center">Compras</h4>

                        <div class="my-3">
                            <span>Unidad de medida: </span>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radios1" id="radio1" checked>
                                <label for="radio1">Unidad</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radios1" id="radio2">
                                <label for="radio2">Precio</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="input-group my-3">
                                <span class="input-group-text">Subcuenta asociada</span>
                                <input class="form-control form-control-md" type="text">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Segunda Columuna -->
                <div class="col col-lg-6 col-md-12 col-sm-12">
                    <div class="offset-2">
                        <h4 class="mt-2 mb-4 d-flex justify-content-center">Ventas</h4>
                        <div class="my-3">

                            <span>Unidad de medida: </span>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="option1" name="radios2" id="radio3"
                                    checked>
                                <label for="radio3">Unidad</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="option2" name="radios2" id="radio4">
                                <label for="radio4">Precio</label>
                            </div>

                        </div>

                        <div class="col ">
                            <div class="input-group my-3">
                                <span class="input-group-text">Subcuenta asociada</span>
                                <input class="form-control form-control-md" type="text">
                            </div>
                        </div>

                    </div>
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

<style src="../../../node_modules/vue-multiselect/dist/vue-multiselect.css">
.form-check-inline {
    margin-right: 20px;
    /* Ajusta este valor según el espaciado deseado */
}
</style>
