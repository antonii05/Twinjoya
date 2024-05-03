<template>
    Empezar con la fecha Prevista
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import type { Reparacion } from "../../models/Reparacion";
import VueMultiselect from 'vue-multiselect'
import CardComponent from "../../components/helpers/CardComponent.vue";


defineProps({
    reparacion: {
        type: Object as () => Reparacion,
        required: true,
    }
})

onMounted(async () => {

})

</script>
