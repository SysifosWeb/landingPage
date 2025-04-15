<script setup>
import Menu from "./Menu.vue";
import backgroundImage from "../../../img/equipoMin.webp";

defineProps({
    title: {
        type: Object,
        required: false,
    },
});
</script>

<template>
    <header
        class="h-[20rem] bg-center bg-cover bg-fixed opacity-90 pt-6"
        :style="{
            backgroundImage: `linear-gradient(#020024e6,#090979e6),url(${backgroundImage})`,
        }"
    >
        <Menu />
        <div class="container mx-auto px-4 text-center text-white mt-10">
            <h1 class="text-5xl font-normal mb-3">{{ title.title }}</h1>
        </div>
    </header>
</template>

<style></style>
