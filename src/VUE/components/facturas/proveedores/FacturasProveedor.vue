<template>
    <div>
        <h1>Facturas Proveedor</h1>
        <div class="col-5">

            <div class="input-group mb-3">
                <span class="input-group-text"><font-awesome-icon icon="magnifying-glass" /></span>
                <input type="text" class="form-control" id="busqueda_1"
                    placeholder="Busque una factura del proveedor y pulse enter" @keyup.enter="buscar('busqueda_1')">
            </div>
        </div>
        {{ facturasProveedor }}
    </div>
</template>

<script setup lang="ts">
import { useFacturaProveedor } from "../../../composables/facturas/useFacturaProveedor";

const { facturasProveedor, buscar } = useFacturaProveedor();
</script>

<style scoped></style>
