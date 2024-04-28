<template>
    <div class="btn-group my-3 shadow-lg" role="group">
        <button v-if="!isCliente" type="button" class="btn btn-info" @click="nuevo">{{ 'Guardar ' + text }}</button>
        <button v-if="isCliente" vtype="button" class="btn btn-" @click="modificar">Modificar</button>
        <button v-if="isCliente" type="button" class="btn btn-danger" @click="eliminar">Eliminar</button>
    </div>
</template>


<script setup lang="ts">

defineProps({
    isCliente: {
        type: Boolean,
        required: true,
    },
    text: {
        type: String,
        required: true,
    }
});

const emit = defineEmits<{
    (e?: 'modificar'): void
    (e: 'crear'): void
    (e?: 'eliminar'): void
}>()

const eliminar = () => {
    emit('eliminar');
}

//Donde data son los datos de un cliente a modificar por ejemplo
const modificar = () => {
    emit('modificar');
}

const nuevo = () => {
    emit('crear');
}

</script>

<style></style>