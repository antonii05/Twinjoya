<template>
    <div class="card shadow-lg mb-3 col px-2 mt-3" :class="size">
        <div class="card-body">
            <slot></slot>
        </div>
    </div>
</template>

<script setup lang="ts">

defineProps({
   size: {
        type: String,
        default: "col-lg-12",
        required: false,
    },
})

</script>


<style scoped>
.card {
    opacity: 0.9;
    background-color: rgb(185, 247, 255);
}
</style>