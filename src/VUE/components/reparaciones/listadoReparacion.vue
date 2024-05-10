<template>
    <div class="px-5">
        <div class="row mt-5">
            <div class="col-lg-10 col">
                <h1>Reparaciones</h1>
            </div>
            <div class="col-lg-2 col">
                <button type="button" class="btn btn-lg btn-info shadow-lg" @click="nuevaReparacion()">Crear una Reparacion</button>
            </div>
        </div>
        <CardComponent>
            <table class="table" style="background-color: transparent;">
                <tr class="encabezado">
                    <th>Numero Reparacion</th>
                    <th>Descripcion</th>
                    <th>Unidades</th>
                    <th>Taller</th>
                </tr>
                <tr class="filas" v-for="(item, index) in listado" :key="index" @click="detalle(item.id)">
                    <td>{{ item.id }}</td>
                    <td>{{ item.descripcion }}</td>
                    <td>{{ item.unidades }}</td>
                    <td v-if="item.taller && item.taller.nombre">
                        {{ item.taller.nombre }}
                    </td>
                    <td class="eliminar text-center">
                        <!-- El .stop hace que no se ejecute mas opciones una vez ejecutado ese @click -->
                        <button class="btn btn-danger" @click.stop="eliminar(item.id)">
                            <font-awesome-icon icon="trash-can" color="#fff" />
                        </button>
                    </td>
                </tr>
            </table>
        </CardComponent>
    </div>
</template>
<script setup lang="ts">
import { ref } from "vue";
import { onMounted } from "vue";
import CardComponent from "../helpers/CardComponent.vue"
import { useReparacion } from "../../composables/useReparaciones";
import type { Reparacion } from "VUE/models/Reparacion";

const { reparaciones, cargarReparaciones, detalle, eliminar, nuevaReparacion } = useReparacion();

onMounted(async () => {
    if(!props.hasParams){
        cargarReparaciones();
    }else{
        listado.value = props.reparacionExterna!
    }
})
const listado = ref(reparaciones);

const props = defineProps({
    hasParams:{
        type: Boolean,
        required:false,
        default: false,
    },
    reparacionExterna:{
        type: Object as () => Reparacion[]
    },
})

</script>

<style>
.table .eliminar {
    --bs-table-bg: #dc3545;
}

.table th,
.table td {
    border-bottom: 1px solid black;
    padding: 8px;
}

.encabezado {
    border-top: 2px solid black;
    border-bottom: 2px solid black;
}

.filas {
    cursor: pointer;
}

.filas:hover {
    background-color: lightblue;
}
</style>
