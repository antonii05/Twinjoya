<script setup lang="ts">
import { RouterView } from "vue-router";
import sideBarComponent from "../../../VUE/components/sideBarComponent.vue";
</script>

<template>
    <div>
        <RouterView v-slot="{ Component }">
            <!-- TODO METER TRANSICIONES -->
            <!-- <transition mode="out-in"> -->
            <component :is="Component" />
            <!-- </transition> -->
        </RouterView>
        <sideBarComponent />
    </div>
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