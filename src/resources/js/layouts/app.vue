<script setup lang="ts">
import { RouterView } from 'vue-router'
import { useRouter } from "vue-router";
import sideBarComponent from '../../components/sideBarComponent.vue';

const ruta = useRouter();

const enviar = () => {
    ruta.push("/home");
};
</script>

<template>
    <RouterView v-slot="{ Component }">
        <Transition name="fade" mode="out-in">
            <component :is="Component" />
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
