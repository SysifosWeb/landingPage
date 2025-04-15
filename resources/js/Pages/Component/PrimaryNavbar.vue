<script setup>
import Menu from "./Menu.vue";
import backgroundImage from "../../../img/equipoMin.webp";
</script>

<template>
    <header
        class="h-[35rem] bg-center bg-cover bg-fixed opacity-90 pt-6"
        :style="{
            backgroundImage: `linear-gradient(#020024e6,#090979e6),url(${backgroundImage})`,
        }"
    >
        <Menu />
        <div class="container mx-auto px-4 text-center text-white mt-20">
            <p class="text-[19px] mb-3">
                Desarrollo web y aplicaciones a medida
            </p>
            <h1 class="text-7xl font-normal mb-5">
                Soluciones digitales a tu medida
            </h1>
            <p class="text-[22px] font-light mb-9">
                Desarrollamos aplicaciones web y software personalizados para
                impulsar tu negocio
            </p>
            <a
                href="https://wa.me/+56949109970"
                class="bg-white hover:bg-cyan-600 hover:text-white text-blue-900 font-normal py-3 px-[70px] rounded-lg inline-flex items-center duration-300 ease-in"
            >
                <svg
                    class="w-6 h-6 mr-2"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M20.4 3.6C18.2 1.3 15.2 0 12 0 5.4 0 0 5.4 0 12c0 2.1.5 4.2 1.4 6L0 24l6.2-1.4c1.8.9 3.8 1.4 5.8 1.4 6.6 0 12-5.4 12-12 0-3.2-1.3-6.2-3.6-8.4zm-8.4 18.4c-1.8 0-3.6-.5-5.2-1.4l-.4-.2-3.8.9.9-3.8-.2-.4c-1-1.6-1.5-3.4-1.5-5.2 0-5.5 4.5-10 10-10s10 4.5 10 10-4.5 10-10 10z"
                    />
                </svg>
                Contáctanos
            </a>
        </div>
    </header>
</template>

<style></style>
