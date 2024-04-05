<script setup lang="ts">
import { RouterView, useRoute } from "vue-router";
import sideBarComponent from "../../../VUE/components/sideBarComponent.vue";
import { onMounted,ref } from "vue";
import HomeView from "../../views/vue/HomeView.vue";

const ComponenteDinamico = ref()
const ruta = useRoute();

onMounted (async() =>{
    if(ruta.path == '/'){
        ComponenteDinamico.value = HomeView;
    }
})

</script>

<template>
    <RouterView v-slot="{ Component }">
        <Transition name="fade" mode="out-in">
            <component :is="Component || ComponenteDinamico" />
        </Transition>
    </RouterView>

    <sideBarComponent />
</template>

<style>
/*
  Enter and leave animations can use different
  durations and timing functions.
*/
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
