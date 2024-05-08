<template>
    <div class="row px-5">

        <CardComponent size="col px-5">
            <div class="row">
                <div class="row">
                    <b>Fecha Estimada</b>
                    <div class="col col-2 p-1">
                        <!-- Dias Aprox -->
                        <div class="input-group">
                            <span class="input-group-text">Dias Aprox</span>
                            <input type="number" class="form-control" v-model="reparacion.diasAprox">
                        </div>
                    </div>
                    <!--  <div class="col col-5 mt-2">
                            <VueDatePicker v-model="date" />
                        </div> -->
                    <!-- unidades -->
                    <div class="col col-2 p-1">
                        <div class="input-group">
                            <span class="input-group-text">Unidades</span>
                            <input type="number" class="form-control" v-model="reparacion.unidades">
                        </div>
                    </div>
                    <!-- Importe -->
                    <div class="col col-2 p-1">
                        <div class="input-group">
                            <span class="input-group-text">Importe</span>
                            <input type="number" class="form-control" v-model="reparacion.importe">
                            <span class="input-group-text">€</span>
                        </div>
                    </div>
                    <!-- FIN DEL ROW -->
                </div>
            </div>

            <div class="row mt-3">
                <b>Descripcion</b>
                <div class="col col-9 mt-2">
                    <textarea cols="30" rows="3" class="form-control" v-model="reparacion.descripcion"></textarea>
                </div>
            </div>

            <div class="row mt-3">
                <b>Reparacion a Realizar</b>
                <div class="col col-7 mt-2">
                    <textarea cols="30" rows="2" class="form-control"
                        v-model="reparacion.reparacion_a_realizar"></textarea>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col col-2">
                    <div class="input-group">
                        <span class="input-group-text">Presupuesto Taller</span>
                        <input type="number" class="form-control" v-model="reparacion.presupuesto_taller">
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col col-2 form-check form-switch mt-2">
                    <input class="form-check-input" type="checkbox" id="hasNumeroSerie" v-model="hasNumeroSerie">
                    <span class="form-check-label" for="hasNumeroSerie">Numero de Serie</span>
                </div>
                <transition name="fade">
                    <div class="col col-2" v-if="hasNumeroSerie">
                        <div class="input-group">
                            <span class="input-group-text">Numero de serie</span>
                            <input type="number" class="form-control" v-model="reparacion.numero_serie">
                        </div>
                    </div>
                </transition>

                <div class="col-auto offset-md-7" v-if="reparacion.created_at" id="fechaAlta">
                    <div class="input-group">
                        <span class="input-group-text">Dado de Alta</span>
                        <input type="datetime-local" class="form-control"
                            :value="formatearFecha(reparacion.created_at)">
                    </div>
                </div>
            </div>

        </CardComponent>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import type { Reparacion } from "../../models/Reparacion";
import CardComponent from "../../components/helpers/CardComponent.vue";
/* import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css' */
import { useUtils } from "../../composables/useUtils";

//Composables
const { formatearFecha } = useUtils();

//variables
const hasNumeroSerie = ref(false);


/* const date = ref(new Date());
date.value.setDate(date.value.getDate() + 15); */

defineProps({
    reparacion: {
        type: Object as () => Reparacion,
        required: true,
    }
})

</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to

/* .fade-leave-active in <2.1.8 */
    {
    opacity: 0;
}
</style>
