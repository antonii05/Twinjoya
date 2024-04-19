<template>
        <div class="card shadow-lg mb-3 col col-lg-12 px-2 mt-3">
            <div class="card-body">
                <slot></slot>
            </div>
        </div>
</template>

<script lang="ts">
    export default {
        name: 'CardComponent',
    }
</script>


<style scoped>
.card{
    opacity: 0.9;
    background-color: rgb(185, 247, 255);
}
</style>