<script setup>
import { Head } from "@inertiajs/vue3";
import Header from "./Component/Header.vue";
import Footer from "./Component/Footer.vue";
import heroImage from "../../img/webDesign_min.webp";
</script>

<template>
    <Head title="SysifosWeb - Desarrollo de Software Profesional" />
    
    <div class="min-h-screen bg-white">
        <Header />
        
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-cyan-600 text-white overflow-hidden pt-16">
            <div class="absolute inset-0 bg-black opacity-20"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="text-center lg:text-left">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                            Desarrollamos el
                            <span class="text-cyan-300">Futuro Digital</span>
                            de tu Empresa
                        </h1>
                        <p class="text-xl md:text-2xl mb-8 text-blue-100 leading-relaxed">
                            Soluciones tecnológicas innovadoras que transforman ideas en realidad digital
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                            <a href="/contacto" class="bg-cyan-400 text-blue-900 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-cyan-300 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Iniciar Proyecto
                            </a>
                            <a href="/portfolio" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-blue-900 transition-all duration-300">
                                Ver Portfolio
                            </a>
                        </div>
                    </div>
                    <div class="flex justify-center lg:justify-end">
                        <div class="relative">
                            <div class="w-80 h-80 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-full opacity-20 absolute -top-4 -left-4"></div>
                            <div class="w-72 h-72 bg-white/10 backdrop-blur-sm rounded-2xl shadow-2xl flex items-center justify-center relative z-10 border border-white/20">
                                <img :src="heroImage" alt="Desarrollo Web Profesional" class="w-64 h-64 object-cover rounded-xl" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Servicios Principales -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Nuestros Servicios
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Ofrecemos soluciones tecnológicas completas para impulsar tu negocio al siguiente nivel
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                        <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Desarrollo Web</h3>
                        <p class="text-gray-600 mb-6">
                            Sitios web modernos, responsivos y optimizados para SEO. Desde landing pages hasta plataformas complejas.
                        </p>
                        <ul class="text-sm text-gray-500 space-y-2">
                            <li>• React, Vue.js, Angular</li>
                            <li>• Laravel, Node.js</li>
                            <li>• E-commerce y CMS</li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                        <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Apps Móviles</h3>
                        <p class="text-gray-600 mb-6">
                            Aplicaciones nativas e híbridas para iOS y Android con experiencia de usuario excepcional.
                        </p>
                        <ul class="text-sm text-gray-500 space-y-2">
                            <li>• React Native, Flutter</li>
                            <li>• iOS y Android nativo</li>
                            <li>• PWA y apps híbridas</li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-shadow duration-300">
                        <div class="w-16 h-16 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Sistemas Empresariales</h3>
                        <p class="text-gray-600 mb-6">
                            ERP, CRM y sistemas personalizados que optimizan los procesos de tu empresa.
                        </p>
                        <ul class="text-sm text-gray-500 space-y-2">
                            <li>• ERP y CRM personalizados</li>
                            <li>• Integración de APIs</li>
                            <li>• Automatización de procesos</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tecnologías -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Tecnologías que Dominamos
                    </h2>
                    <p class="text-xl text-gray-600">
                        Trabajamos con las tecnologías más modernas y demandadas del mercado
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
                    <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-16 h-16 bg-blue-500 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-white font-bold text-lg">React</span>
                        </div>
                        <span class="text-sm font-medium text-gray-700">React</span>
                    </div>
                    <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-16 h-16 bg-green-500 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-white font-bold text-lg">Vue</span>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Vue.js</span>
                    </div>
                    <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-16 h-16 bg-red-500 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-white font-bold text-lg">L</span>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Laravel</span>
                    </div>
                    <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-16 h-16 bg-green-600 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-white font-bold text-lg">Node</span>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Node.js</span>
                    </div>
                    <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-16 h-16 bg-blue-400 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-white font-bold text-lg">RN</span>
                        </div>
                        <span class="text-sm font-medium text-gray-700">React Native</span>
                    </div>
                    <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-16 h-16 bg-blue-600 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-white font-bold text-lg">FL</span>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Flutter</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Proceso de Trabajo -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Nuestro Proceso
                    </h2>
                    <p class="text-xl text-gray-600">
                        Metodología ágil que garantiza resultados excepcionales
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-white text-2xl font-bold">1</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Análisis</h3>
                        <p class="text-gray-600">
                            Entendemos tus necesidades y objetivos para crear la estrategia perfecta.
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="w-20 h-20 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-white text-2xl font-bold">2</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Diseño</h3>
                        <p class="text-gray-600">
                            Creamos prototipos y diseños que reflejan la identidad de tu marca.
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="w-20 h-20 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-white text-2xl font-bold">3</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Desarrollo</h3>
                        <p class="text-gray-600">
                            Implementamos la solución usando las mejores prácticas y tecnologías.
                        </p>
                    </div>
                    <div class="text-center">
                        <div class="w-20 h-20 bg-cyan-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-white text-2xl font-bold">4</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Entrega</h3>
                        <p class="text-gray-600">
                            Desplegamos tu proyecto y brindamos soporte continuo para su éxito.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonios -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Lo que Dicen Nuestros Clientes
                    </h2>
                    <p class="text-xl text-gray-600">
                        Testimonios reales de empresas que han confiado en nosotros
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-gray-50 rounded-xl p-8">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6">
                            "SysifosWeb transformó completamente nuestra presencia digital. El equipo es profesional y los resultados superaron nuestras expectativas."
                        </p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-semibold">MR</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">María Rodríguez</p>
                                <p class="text-gray-500">CEO, TechStart</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-8">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6">
                            "La aplicación móvil que desarrollaron aumentó nuestras ventas en un 40%. Excelente trabajo y comunicación constante."
                        </p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-semibold">CL</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Carlos López</p>
                                <p class="text-gray-500">Fundador, EcoShop</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-8">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6">
                            "Sistema ERP que revolucionó nuestra gestión. Ahora todo es más eficiente y tenemos mejor control de nuestros procesos."
                        </p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-semibold">AS</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Ana Silva</p>
                                <p class="text-gray-500">Gerente, InnovateCorp</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Final -->
        <section class="py-20 bg-gradient-to-r from-blue-900 to-cyan-600 text-white">
            <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    ¿Listo para Transformar tu Negocio?
                </h2>
                <p class="text-xl mb-8 text-blue-100">
                    Conversemos sobre tu proyecto y descubre cómo podemos ayudarte a alcanzar tus objetivos digitales.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/contacto" class="bg-white text-blue-900 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition-colors duration-300">
                        Solicitar Cotización
                    </a>
                    <a href="https://wa.me/56912345678" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-blue-900 transition-colors duration-300">
                        WhatsApp
                    </a>
                </div>
            </div>
        </section>

        <Footer />
    </div>
</template>
