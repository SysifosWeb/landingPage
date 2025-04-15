<script setup>
import SecondaryNavbar from "./Component/SecondaryNavbar.vue";
import { usePage } from "@inertiajs/vue3";
import { computed } from "vue";
const page = usePage();
const secondaryNavbarData = computed(() => page.props.secondaryNavbarData);
</script>

<template>
    <main>
        <header>
            <SecondaryNavbar :title="secondaryNavbarData" />
        </header>
        <article>
            <slot />
        </article>
    </main>
</template>
