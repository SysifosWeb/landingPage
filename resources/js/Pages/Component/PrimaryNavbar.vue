<script setup>
import Menu from "./Menu.vue";
import backgroundImage from "../../../img/home_image2.png";
</script>

<template>
    <header
        class="h-[35rem] bg-gradient-to-b from-blue-900 from-20% via-blue-800 via-40% to-sky-400 to-90% pt-6"
    >
        <Menu />
        <div
            class="max-w-screen-xl flex items-center justify-between mx-auto pt-[4rem]"
        >
            <!-- <div class="container mx-auto px-4 text-center text-white mt-20"> -->
            <div class="ml-8 text-left text-white mt-18">
                <p class="text-[19px] mb-3">
                    Desarrollo web y aplicaciones a medida
                </p>
                <h1 class="text-6xl font-normal mb-5">
                    Soluciones digitales <br />a tu medida
                </h1>
                <p class="text-[22px] font-light mb-9">
                    Desarrollamos aplicaciones web <br />
                    y software personalizados para impulsar tu negocio
                </p>
                <a
                    href="https://wa.me/+56949109970"
                    class="bg-blue-800 hover:bg-white hover:text-blue-800 text-white font-normal py-3 px-[70px] rounded-lg inline-flex items-center duration-300 ease-in"
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
            <div class="@container mx-auto">
                <img
                    :src="backgroundImage"
                    alt="Background Image"
                    class="h-[32rem] object-cover"
                />
            </div>
        </div>
    </header>
</template>

<style></style>
