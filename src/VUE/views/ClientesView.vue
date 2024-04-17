<template>
    <h1>Clientes</h1>
    {{ cliente.nombre }}
</template>
<script setup lang="ts">
import { onMounted, ref } from "vue";
import type { Cliente } from "@/VUE/models/Cliente";
import ClientesApi from '@/VUE/api/ClientesApi'

const clientes = ref([] as Cliente[]);
const cliente = ref({} as Cliente);
onMounted(async () => {
    try {
        clientes.value = await ClientesApi.getClientes();
        cliente.value = await ClientesApi.detalleCliente(1);
    } catch (error) {

        console.log(error);
    }
})
</script>