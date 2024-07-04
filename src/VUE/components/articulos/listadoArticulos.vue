<template>
    <div class="px-5">
        <h1>Articulos</h1>
        <div class="row align-items-center">
            <div class="col-lg-4 col order-lg-1">
                <div class="input-group">
                    <span class="input-group-text"><font-awesome-icon icon="magnifying-glass" /></span>
                    <input type="text" class="form-control" placeholder="Busque un articulo por su codigo"
                        @keyup.enter="buscar(false)" id="buscarArticulo" v-model="articulo.codigo">
                </div>
            </div>
            <div class="col-lg-8 col order-lg-2">
                <button type="button" class="btn btn-lg btn-info shadow-lg my-3"
                    @click="$router.push('/articulo/nuevo')">Nuevo Articulo</button>
            </div>
        </div>
        <CardComponent>
            <table class="table responsive-table">

                <colgroup>
                    <col style="width: 5%;" />
                    <col style="width: 15%;" />
                    <col style="width: 25%;" />
                    <col style="width: 20%;" />
                    <col style="width: 20%;" />
                    <col style="width: 5%;" />
                </colgroup>
                <tr class="encabezado fw-bold text-capitalize">
                    <th>ID</th>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th>Proveedor</th>
                    <th>Familia</th>
                </tr>

                <tr class="filas" v-for="(articulo, index) in articulos" :key="index" @click="detalle(articulo.id)">
                    <th class="text-primary">{{ articulo.id }}</th>
                    <td class="text-uppercase">{{ articulo.codigo }}</td>
                    <td class="text-uppercase">{{ articulo.descripcion }}</td>
                    <td class="text-uppercase">{{ articulo.proveedor.nombre_fiscal }}</td>
                    <!-- Comprueba si la familia existe -->
                    <td class="text-uppercase" v-if="articulo.familia && articulo.familia.nombre">{{
                        articulo.familia.nombre }}</td>
                    <td class="text-uppercase" v-else>Articulo sin familia</td>
                    <!-- Acciones -->
                    <td class="eliminar text-center">
                        <button class="btn btn-danger" @click.stop="eliminar(articulo.id)">
                            <font-awesome-icon icon="trash-can" color="#fff" />
                        </button>
                    </td>
                </tr>
            </table>
        </CardComponent>
    </div>
</template>
<script setup lang="ts">
import { onMounted } from "vue";
import CardComponent from "../helpers/CardComponent.vue"
import { useArticulos } from "../../composables/useArticulo";

const { articulos, cargarArticulos, detalle, eliminar, buscar,articulo } = useArticulos();

onMounted(async () => {
    cargarArticulos();
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
