<script setup>
import { Head } from "@inertiajs/vue3";
import Header from "./Component/Header.vue";
import Footer from "./Component/Footer.vue";
import pc from "../../img/pc.png";
import iphone from "../../img/iphone.png";
import building from "../../img/building.png";
import analysis from "../../img/analysis.png";
import design from "../../img/design.png";
import development from "../../img/development.png";
import delivery from "../../img/delivery.png";
</script>

<template>
    <Head title="Servicios - SysifosWeb" />

    <div class="min-h-screen bg-white">
        <Header />

        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-blue-900 to-cyan-600 text-white py-20 pt-36">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    Nuestros Servicios
                </h1>
                <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                    Soluciones tecnológicas completas para impulsar tu negocio al siguiente nivel
                </p>
            </div>
        </section>

        <!-- Servicios Principales -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 sm:gap-10">

            <!-- Desarrollo Web: Landing Page -->
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                    <img :src="pc" alt="Desarrollo Web" class="w-12 h-12">
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Landing Page</h3>
                <p class="text-gray-600 mb-6">
                    Landing page moderna y optimizada para atraer clientes y generar contacto directo.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        1–5 secciones
                    </li>
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Diseño básico
                    </li>
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Formulario de contacto
                    </li>
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Integración con WhatsApp/Correo
                    </li>
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        SEO inicial
                    </li>
                </ul>
                <div class="text-sm text-gray-500 mb-4">
                    <strong>Tecnologías:</strong> React, Vue.js, Laravel, Node.js, TypeScript
                </div>
                <a href="/contacto" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-200 mt-auto inline-block">
                    Solicitar Cotización
                </a>
            </div>

            <!-- Desarrollo Web: E-commerce -->
            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                    <img :src="iphone" alt="Aplicaciones Móviles" class="w-12 h-12">
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">E-commerce</h3>
                <p class="text-gray-600 mb-6">
                    Desarrollamos tu e-commerce completo con pasarela de pago y carga inicial de productos.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Tienda online
                    </li>
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Pasarela de pago
                    </li>
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Integración de envíos
                    </li>
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Carga inicial de productos (hasta 20)
                    </li>
                </ul>
                <div class="text-sm text-gray-500 mb-4">
                    <strong>Tecnologías:</strong> React Native, Flutter, Swift, Kotlin
                </div>
                <a href="/contacto" class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors duration-200 mt-auto inline-block">
                    Solicitar Cotización
                </a>
            </div>

            <!-- Desarrollo Web: WordPress -->
            <div class="bg-gradient-to-br from-teal-50 to-teal-100 rounded-2xl p-8 hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                    <img :src="building" alt="Sistemas Empresariales" class="w-12 h-12">
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Sitio WordPress</h3>
                <p class="text-gray-600 mb-6">
                    Sitio WordPress personalizado, adaptable y fácil de gestionar, con capacitación incluida.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Plantilla personalizada
                    </li>
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Plugins esenciales
                    </li>
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        SEO básico
                    </li>
                </ul>
                <div class="text-sm text-gray-500 mb-4">
                    <strong>Tecnologías:</strong> WordPress, Elementor, WooCommerce
                </div>
                <a href="/contacto" class="bg-teal-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-teal-700 transition-colors duration-200 mt-auto inline-block">
                    Solicitar Cotización
                </a>
            </div>
            <!-- Software a Medida -->
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8 hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                    <img :src="software" alt="Software a Medida" class="w-12 h-12">
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Software a Medida</h3>
                <p class="text-gray-600 mb-6">
                    Soluciones personalizadas para optimizar procesos internos de tu empresa.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Gestión de datos
                    </li>
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Automatización de procesos
                    </li>
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Reportes y analíticas
                    </li>
                </ul>
                <div class="text-sm text-gray-500 mb-4">
                    <strong>Tecnologías:</strong> PHP, Laravel, MySQL, Node.js, Vue.js
                </div>
                <a href="/contacto" class="bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors duration-200 mt-auto inline-block">
                    Solicitar Cotización
                </a>
            </div>

            <!-- Mantenimiento Web -->
            <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-2xl p-8 hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                    <img :src="mantenimiento" alt="Mantenimiento Web" class="w-12 h-12">
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Mantenimiento Web</h3>
                <p class="text-gray-600 mb-6">
                    Aseguramos que tu sitio web esté siempre actualizado, seguro y funcionando correctamente.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Actualización de contenido
                    </li>
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Backups periódicos
                    </li>
                    <li class="flex items-center text-gray-700">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Monitoreo de seguridad
                    </li>
                </ul>
                <div class="text-sm text-gray-500 mb-4">
                    <strong>Tecnologías:</strong> WordPress, Laravel, HTML, CSS, JavaScript
                </div>
                <a href="/contacto" class="bg-yellow-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-yellow-700 transition-colors duration-200 mt-auto inline-block">
                    Solicitar Cotización
                </a>
            </div>

        </div>
    </div>
</section>
        <!-- Proceso de Desarrollo -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Nuestro Proceso de Desarrollo
                    </h2>
                    <p class="text-xl text-gray-600">
                        Metodología ágil que garantiza entregas de calidad en tiempo y forma
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="w-20 h-20 rounded-full bg-blue-200 flex items-center justify-center mx-auto mb-6">
                            <img :src="analysis" alt="Análisis y Planificación" class="w-12 h-12">
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Análisis y Planificación</h3>
                        <p class="text-gray-600">
                            Entendemos tus necesidades, definimos objetivos y creamos una estrategia detallada para tu proyecto.
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="w-20 h-20 rounded-full bg-orange-300 flex items-center justify-center mx-auto mb-6">
                            <img :src="design" alt="Diseño UX/UI" class="w-12 h-12">
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Diseño UX/UI</h3>
                        <p class="text-gray-600">
                            Creamos wireframes, prototipos y diseños que reflejan la identidad de tu marca y optimizan la experiencia del usuario.
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="w-20 h-20 rounded-full bg-cyan-500 flex items-center justify-center mx-auto mb-6">
                            <img :src="development" alt="Desarrollo Ágil" class="w-12 h-12">
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Desarrollo Ágil</h3>
                        <p class="text-gray-600">
                            Programamos con sprints de 2 semanas, entregas incrementales y feedback continuo para asegurar la calidad.
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="w-20 h-20 rounded-full bg-blue-500 flex items-center justify-center mx-auto mb-6">
                            <img :src="delivery" alt="Lanzamiento y Soporte" class="w-12 h-12">
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Lanzamiento y Soporte</h3>
                        <p class="text-gray-600">
                            Desplegamos tu proyecto en producción y brindamos soporte técnico continuo para garantizar su funcionamiento óptimo.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tecnologías -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Stack Tecnológico
                    </h2>
                    <p class="text-xl text-gray-600">
                        Trabajamos con las tecnologías más modernas y demandadas del mercado
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-gray-50 rounded-xl p-8">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6 text-center">Frontend</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700">React & Next.js</span>
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="w-full h-2 bg-blue-500 rounded-full"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700">Vue.js & Nuxt.js</span>
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="w-full h-2 bg-green-500 rounded-full"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700">Angular</span>
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="w-3/4 h-2 bg-red-500 rounded-full"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700">TypeScript</span>
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="w-full h-2 bg-blue-600 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-8">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6 text-center">Backend</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700">Laravel & PHP</span>
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="w-full h-2 bg-red-500 rounded-full"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700">Node.js & Express</span>
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="w-full h-2 bg-green-600 rounded-full"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700">Python & Django</span>
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="w-3/4 h-2 bg-blue-500 rounded-full"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700">APIs RESTful</span>
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="w-full h-2 bg-purple-500 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-8">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6 text-center">DevOps & Cloud</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700">AWS & Azure</span>
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="w-full h-2 bg-orange-500 rounded-full"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700">Docker & Kubernetes</span>
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="w-3/4 h-2 bg-blue-600 rounded-full"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700">CI/CD Pipelines</span>
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="w-full h-2 bg-green-500 rounded-full"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-700">Monitoring</span>
                                <div class="w-16 h-2 bg-gray-200 rounded-full">
                                    <div class="w-3/4 h-2 bg-purple-500 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="py-20 bg-gradient-to-r from-blue-900 to-cyan-600 text-white">
            <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    ¿Listo para Comenzar tu Proyecto?
                </h2>
                <p class="text-xl mb-8 text-blue-100">
                    Conversemos sobre tus necesidades y te ayudaremos a encontrar la solución perfecta
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/contacto" class="bg-white text-blue-900 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition-colors duration-300">
                        Solicitar Cotización
                    </a>
                    <a href="/portfolio" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-blue-900 transition-colors duration-300">
                        Ver Proyectos
                    </a>
                </div>
            </div>
        </section>

        <Footer />
    </div>
</template>
