<template>
    
    <div v-if="familia.id">
        <CardComponent size="col-5">
            <h1>Poner nombre</h1>
            <h3 class="my-4 text-uppercase">{{ 'Código: ' + familia.codigo }}</h3>
            <h6>Meter Informacion del empleaado que le ha dado de alta</h6>
        </CardComponent>
    </div>

    <div v-if="!familia.id">
        <CardComponent size="col-4">
            <h1 class="text-center">Creación del Proveedor</h1>
        </CardComponent>
    </div>

    
    <div class="row">
        <div class="col col-9">
            
        </div>
        <div class="col">
            <BotonesCrud @crear="crear(familia)" @eliminar="eliminar(familia.id)" @modificar="modificar(familia)"
            :is-cliente="!!familia.id" text='nueva Famlia' />
        </div>
    </div>
    
    <div id="vistas">
        <detalleFamilia :familia="familia" />
    </div>

    {{ familia }}
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import { useRoute } from "vue-router";
import { useFamilias } from "../../composables/useFamilias";

import CardComponent from "../../components/helpers/CardComponent.vue";
import BotonesCrud from "../../components/helpers/BotonesCrudComponent.vue";
import detalleFamilia from "../../components/familias/detalleFamilia.vue";

//Estrcuctura Composable
const route = useRoute();
const { familia, detalle, eliminar, nuevaFamilia, crear, modificar } = useFamilias();

onMounted(async () => {
    try {
        if (route.params.id) {
            detalle(parseInt(route.params.id as string));
        } else {
            nuevaFamilia()
        }
    } catch (error) {
        console.log("error en la vista de detalle ERROR: " + error);
    }
})

</script>
