<script setup>
import { ref, onMounted, onUnmounted } from "vue";
import { Link } from "@inertiajs/vue3";
import logoBlanco from "../../../img/logo-blanco.webp";

const isMenuOpen = ref(false);
const isScrolled = ref(false);

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

const closeMenu = () => {
    isMenuOpen.value = false;
};

const handleScroll = () => {
    // Detectar si el usuario ha hecho scroll más allá del banner (aproximadamente 400px)
    isScrolled.value = window.scrollY > 200;
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
    // Verificar el scroll inicial
    handleScroll();
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
    <header 
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-500"
        :class="[
            isScrolled 
                ? 'bg-blue-900/95 backdrop-blur-md shadow-lg' 
                : 'bg-transparent'
        ]"
    >
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <Link href="/" class="flex items-center space-x-3 flex-shrink-0">
                    <img :src="logoBlanco" alt="SysifosWeb Logo" class="h-8 w-auto drop-shadow-lg" />
                </Link>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <Link 
                        href="/" 
                        class="font-medium transition-colors duration-200 text-white drop-shadow-lg hover:text-cyan-200"
                        @click="closeMenu"
                    >
                        Inicio
                    </Link>
                    <Link 
                        href="/nosotros" 
                        class="font-medium transition-colors duration-200 text-white drop-shadow-lg hover:text-cyan-200"
                        @click="closeMenu"
                    >
                        Nosotros
                    </Link>
                    <Link 
                        href="/servicios" 
                        class="font-medium transition-colors duration-200 text-white drop-shadow-lg hover:text-cyan-200"
                        @click="closeMenu"
                    >
                        Servicios
                    </Link>
                    <!-- <Link 
                        href="/portfolio" 
                        class="font-medium transition-colors duration-200 text-white drop-shadow-lg hover:text-cyan-200"
                        @click="closeMenu"
                    >
                        Portfolio
                    </Link> -->
                    <Link 
                        href="/blog" 
                        class="font-medium transition-colors duration-200 text-white drop-shadow-lg hover:text-cyan-200"
                        @click="closeMenu"
                    >
                        Blog
                    </Link>
                    <Link 
                        href="/contacto" 
                        class="bg-cyan-400 text-blue-900 px-4 py-2 rounded-lg font-semibold hover:bg-cyan-300 hover:scale-105 transition-all duration-200 shadow-lg"
                        @click="closeMenu"
                    >
                        Contacto
                    </Link>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button
                        @click="toggleMenu"
                        type="button"
                        class="text-white drop-shadow-lg hover:text-cyan-200 focus:text-cyan-200 transition-colors duration-200 focus:outline-none"
                        aria-controls="mobile-menu"
                        :aria-expanded="isMenuOpen"
                    >
                        <span class="sr-only">Abrir menú principal</span>
                        <!-- Hamburger icon -->
                        <svg 
                            class="h-6 w-6" 
                            :class="{ 'hidden': isMenuOpen, 'block': !isMenuOpen }"
                            xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Close icon -->
                        <svg 
                            class="h-6 w-6" 
                            :class="{ 'block': isMenuOpen, 'hidden': !isMenuOpen }"
                            xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div 
                class="md:hidden"
                :class="{ 'block': isMenuOpen, 'hidden': !isMenuOpen }"
                id="mobile-menu"
            >
                <div class="px-2 pt-2 pb-3 space-y-1 bg-black/80 backdrop-blur-md rounded-lg mt-2 mb-4 border border-white/30">
                    <Link 
                        href="/" 
                        class="text-white/90 hover:text-cyan-300 hover:bg-blue-700/50 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200"
                        @click="closeMenu"
                    >
                        Inicio
                    </Link>
                    <Link 
                        href="/nosotros" 
                        class="text-white/90 hover:text-cyan-300 hover:bg-blue-700/50 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200"
                        @click="closeMenu"
                    >
                        Nosotros
                    </Link>
                    <Link 
                        href="/servicios" 
                        class="text-white/90 hover:text-cyan-300 hover:bg-blue-700/50 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200"
                        @click="closeMenu"
                    >
                        Servicios
                    </Link>
                    <Link 
                        href="/portfolio" 
                        class="text-white/90 hover:text-cyan-300 hover:bg-blue-700/50 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200"
                        @click="closeMenu"
                    >
                        Portfolio
                    </Link>
                    <Link 
                        href="/blog" 
                        class="text-white/90 hover:text-cyan-300 hover:bg-blue-700/50 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200"
                        @click="closeMenu"
                    >
                        Blog
                    </Link>
                    <Link 
                        href="/contacto" 
                        class="bg-cyan-400 text-blue-900 hover:bg-cyan-300 block px-3 py-2 rounded-md text-base font-semibold transition-colors duration-200 mt-4 shadow-lg"
                        @click="closeMenu"
                    >
                        Contacto
                    </Link>
                </div>
            </div>
        </nav>
    </header>
</template> 