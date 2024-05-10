<!--  Componente creado en el Trabajo -->
<template>
    <!-- Button trigger modal -->
    <button v-show="false" type="button" id="botonParaMostrar" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#mostrarModal"></button>

    <!-- Modal -->
    <div class="modal fade" id="mostrarModal" tabindex="-1" aria-labelledby="mostrarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 v-if="!props.tipoMensaje" class="text-danger">
                        <span>
                            <font-awesome-icon icon="triangle-exclamation" />
                        </span>
                        Error
                    </h5>
                    <h5 v-if="props.tipoMensaje">Perfecto! </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <span v-if="props.tipoMensaje">{{ props.mensaje }} </span>

                    <span v-if="!props.tipoMensaje">
                        {{ props.mensaje }}
                    </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="cerrar" data-bs-dismiss="modal"
                        @click="cerrarModal()">
                        Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { onMounted, watch } from "vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { useRouter } from "vue-router";

const router = useRouter();

//Al montarse se define si mostrarse o no
onMounted(() => {
    if (props.mostrar) {
        mostrar();
    }
});

const props = defineProps({
    mensaje: {
        type: String,
        required: false,
        default: "Añada Informacion",
    },
    //si se le pasa true es una respuesta correcta y false para una respuesta incorrecta 
    tipoMensaje: {
        type: Boolean,
        required: true,
        default: false,
    },
    mostrar: {
        type: Boolean,
        required: true,
    },
    tiempo: {
        type: Number,
        required: true,
    },
    ruta: String,
});

//este watch es un listener de la variable mostrar que nos pasa el Front, donde si es true se ejcuta el click del boton para el modal
watch(() => props.mostrar, (estado) => {
    if (estado) {
        mostrar();
    }
});

/**
 * Se define un emit el cual se encarga de mandar la funcion de cerrar al componente padre, 
 * donde este componente padre cambiara a false la variable 'mostrarModal' y cambiara a la ruta en caso de que tenga
*/
const emit = defineEmits<{
    (e: 'cerrar'): void
}>();


//Funcion que muestra el modal recogiendo el id del boton escondido haciendole click, 
const mostrar = () => {
    document.getElementById("botonParaMostrar")?.click();

    //pasado el tiempo que se determina hace click en el boton de cerrar modal donde llama a la funcion @cerrarModal
    setTimeout(() => {
        document.getElementById("cerrar")?.click();
        
    }, props.tiempo);
}

//Funcion Encarcada de Cerrar el modal e ir a la ruta pasada como parametros en caso de que la tenga definida
const cerrarModal = () => {
    emit('cerrar');
    if(props.ruta && props.tipoMensaje){
        router.push(''+props.ruta);
    }
}

</script>

<style scoped></style>