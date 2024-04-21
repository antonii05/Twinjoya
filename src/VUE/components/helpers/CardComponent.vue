<template>
    <div class="card shadow-lg mb-3 col px-2 mt-3" :class="size">
        <div class="card-body">
            <slot></slot>
        </div>
    </div>
</template>

<script lang="ts">
import { defineProps } from 'vue';

export default {

    props: {
        size: {
            type: String,
            default: "col-lg-12",
            required: false,
        }
    },
    name: 'CardComponent',

}
</script>


<style scoped>
.card {
    opacity: 0.9;
    background-color: rgb(185, 247, 255);
}
</style>