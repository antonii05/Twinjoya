<template>
    <div v-if="articulo.id">
        <CardComponent size="col-5">
            <h1>{{ 'Articulo: ' + articulo.codigo }}</h1>
            <h3 class="my-4 text-uppercase">{{ 'Código: ' + articulo.codigo }}</h3>
            <h6>Meter Informacion del empleaado que le ha dado de alta</h6>
        </CardComponent>
    </div>

    <div v-if="!articulo.id">
        <CardComponent size="col-4">
            <h1 class="text-center">Creación del Articulo</h1>
        </CardComponent>
    </div>

    <div class="row">
        <div class="col-lg-10">
            <div class="btn-group my-3" role="group">
                <button type="button" class="btn btn-info" @click="cambiarPestania('detalle')">Información</button>
                <button type="button" class="btn btn-info" @click="cambiarPestania('ultimaCompra')">Ultima
                    Compra</button>
                    <button type="button" class="btn btn-info"
                    @click="cambiarPestania('inventario')">Inventario</button>
                    <button type="button" class="btn btn-info" @click="cambiarPestania('masDatos')">Datos Adicionales</button>
                    <button type="button" class="btn btn-info" @click="cambiarPestania('web')">Web</button>
                    <button type="button" class="btn btn-info" @click="cambiarPestania('imagen')">Imagen</button>
                    <button type="button" class="btn btn-info" @click="cambiarPestania('notas')">Notas</button>

            </div>

        </div>
        <div class="col">
            <BotonesCrud @crear="crear(articulo)" @eliminar="eliminar(articulo.id)" @modificar="modificar(articulo)"
                :is-cliente="!!articulo.id" text='Registrar Articulo' />
        </div>
    </div>

    <div id="vistas">
        <div class="informacion" v-if="selector == 'detalle'">
            <detalleArticulo :articulo="articulo" />
        </div>

        <div class="datosFacturacion" v-if="selector == 'ultimaCompra'">
            <ultimaCompraArticulo :articulo="articulo" />
        </div>

        <div class="datosFacturacion" v-if="selector == 'notas'">
            <notas :articulo="articulo" />
        </div>

        <div class="datosFacturacion" v-if="selector == 'imagen'">
            <imagen :articulo="articulo" />
        </div>

        <div class="datosFacturacion" v-if="selector == 'inventario'">
            <inventario :articulo="articulo" />
        </div>

        <div class="datosFacturacion" v-if="selector == 'masDatos'">
            <masDatos :articulo="articulo" />
        </div>

        <div class="datosFacturacion" v-if="selector == 'web'">
            <web :articulo="articulo" />
        </div>
    </div>
{{ articulo }}
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import { useRoute } from "vue-router";
import CardComponent from "@/VUE/components/helpers/CardComponent.vue";
import BotonesCrud from "@/VUE/components/helpers/BotonesCrudComponent.vue";
import { useArticulos } from "@/VUE/composables/useArticulo";
import detalleArticulo from "@/VUE/components/articulos/detalleArticulos.vue";
import masDatos from "@/VUE/components/articulos/otrosDatosArticulos.vue";
import ultimaCompraArticulo from "@/VUE/components/articulos/ultimaCompraArticulos.vue";
import imagen from "@/VUE/components/articulos/imagenArticulos.vue";
import inventario from "@/VUE/components/articulos/inventarioArticulos.vue";
import notas from "@/VUE/components/articulos/notasArticulos.vue";
import web from "@/VUE/components/articulos/webArticulos.vue";



//Estrcuctura Composable
const { articulo, selector, cambiarPestania, crear, eliminar, modificar, detalle, nuevoArticulo } = useArticulos();

const route = useRoute();

onMounted(async () => {
    selector.value = 'detalle';
    if (route.params.id) {
        detalle(parseInt(route.params.id as string));
    } else {
        nuevoArticulo();
    }
})

</script>