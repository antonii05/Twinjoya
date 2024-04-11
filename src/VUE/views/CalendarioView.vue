<template>
    <div>
        <h1>Calendario</h1>
        <DatePicker v-model="date" />
    </div>
</template>

<script setup lang="ts">
import { Calendar, DatePicker } from "v-calendar";
import "v-calendar/style.css";
const date = new Date();
</script>

<style></style>
    