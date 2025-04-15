<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import logo from "../../../img/logo-blanco.webp";

const isMenuOpen = ref(false);
const links = [
    { name: "Home", link: "/" },
    { name: "Nosotros", link: "/nosotros" },
    { name: "Servicios", link: "/servicios" },
    { name: "Contacto", link: "/contactos" },
];

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};
</script>

<template>
    <nav class="w-full z-50 border-gray-200 bg-transparent">
        <div
            class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
        >
            <!-- Logo -->
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img :src="logo" class="h-10" alt="Sysifos web Logo" />
            </a>
            <!-- Botón para abrir el menú en mobile -->
            <button
                @click="toggleMenu"
                type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default"
                :aria-expanded="isMenuOpen.toString()"
            >
                <span class="sr-only">Open main menu</span>
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 17 14"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15"
                    />
                </svg>
            </button>
            <!-- Menú (Responsive) -->
            <div
                :class="{ block: isMenuOpen, hidden: !isMenuOpen }"
                class="w-full md:block md:w-auto"
            >
                <ul
                    class="flex flex-col font-medium mt-4 rounded-lg bg-gray-50/80 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent"
                >
                    <li v-for="link in links" :key="link.name">
                        <Link
                            :href="link.link"
                            class="block py-2 px-3 text-[20px] font-light text-white font-roboto rounded hover:bg-gray-100/20 md:hover:bg-transparent md:border-0 md:hover:text-blue-400 md:p-0"
                        >
                            {{ link.name }}
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<style>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap");

* {
    font-family: "Roboto", sans-serif;
}
</style>
