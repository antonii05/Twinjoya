<template>
    <div id="vistas">
        <detalleFamilia :familia="familia" />
    </div>

    <div class="row">
        <div class="col col-10">
            
        </div>
        <div class="col">
            <BotonesCrud @crear="crear(familia)" @eliminar="eliminar(familia.id)" @modificar="modificar(familia)"
                :is-cliente="!!familia.id" text='nueva Famlia' />
        </div>
    </div>


    {{ familia }}
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import { useRoute } from "vue-router";
import { useFamilias } from "../../composables/useFamilias";

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
