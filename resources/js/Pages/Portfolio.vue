<script setup>
import { Head } from "@inertiajs/vue3";
import Header from "./Component/Header.vue";
import Footer from "./Component/Footer.vue";
</script>

<template>
    <Head title="Portfolio - SysifosWeb" />
    
    <div class="min-h-screen bg-white">
        <Header />
        
        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-blue-900 to-cyan-600 text-white py-20 pt-36">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    Nuestro Portfolio
                </h1>
                <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                    Descubre los proyectos que hemos desarrollado y cómo hemos ayudado a nuestros clientes a alcanzar sus objetivos
                </p>
            </div>
        </section>

        <!-- Proyecto Destacado -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Proyecto Destacado
                    </h2>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-8 lg:p-12">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div>
                            <div class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium mb-4">
                                Plataforma E-learning
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">TechStart Academy</h3>
                            <p class="text-lg text-gray-600 mb-6">
                                Desarrollamos una plataforma completa de e-learning que permite a más de 5,000 estudiantes 
                                acceder a cursos de tecnología de alta calidad. La plataforma incluye sistema de pagos, 
                                certificaciones, foros de discusión y seguimiento de progreso.
                            </p>
                            
                            <div class="grid grid-cols-2 gap-6 mb-8">
                                <div>
                                    <div class="text-2xl font-bold text-blue-600">5,000+</div>
                                    <div class="text-gray-600">Estudiantes Activos</div>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-blue-600">200+</div>
                                    <div class="text-gray-600">Cursos Disponibles</div>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">React</span>
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Laravel</span>
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">MySQL</span>
                                <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm">AWS</span>
                            </div>

                            <a href="/contacto" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-200 inline-block">
                                Desarrollar Similar
                            </a>
                        </div>

                        <div class="relative">
                            <div class="w-full h-80 bg-gradient-to-br from-blue-100 to-cyan-100 rounded-xl flex items-center justify-center">
                                <div class="text-center">
                                    <div class="text-6xl mb-4">🎓</div>
                                    <p class="text-gray-600 font-medium">TechStart Academy</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Proyectos por Industria -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Proyectos por Industria
                    </h2>
                    <p class="text-xl text-gray-600">
                        Hemos trabajado con empresas de diversos sectores
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Salud -->
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">HealthCare Plus</h3>
                        <p class="text-gray-600 mb-4">
                            Sistema de gestión hospitalaria que optimiza la atención al paciente y administración médica.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Vue.js</span>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Laravel</span>
                        </div>
                    </div>

                    <!-- E-commerce -->
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">EcoShop</h3>
                        <p class="text-gray-600 mb-4">
                            Plataforma de e-commerce sustentable con más de 10,000 productos y sistema de logística integrado.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">React</span>
                            <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-xs">Node.js</span>
                        </div>
                    </div>

                    <!-- Fintech -->
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">FinanceApp</h3>
                        <p class="text-gray-600 mb-4">
                            Aplicación móvil para gestión financiera personal con análisis de gastos y planificación de presupuestos.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">React Native</span>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Laravel</span>
                        </div>
                    </div>

                    <!-- Educación -->
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">EduManage</h3>
                        <p class="text-gray-600 mb-4">
                            Sistema integral de gestión educativa para colegios con módulos de notas, asistencia y comunicación.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Angular</span>
                            <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-xs">.NET</span>
                        </div>
                    </div>

                    <!-- Restaurantes -->
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">RestaurantPOS</h3>
                        <p class="text-gray-600 mb-4">
                            Sistema POS completo para restaurantes con gestión de mesas, inventario y delivery integrado.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Vue.js</span>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Laravel</span>
                        </div>
                    </div>

                    <!-- Empresarial -->
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300">
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">CorporateERP</h3>
                        <p class="text-gray-600 mb-4">
                            Sistema ERP empresarial que integra contabilidad, recursos humanos, inventario y ventas.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">React</span>
                            <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-xs">Python</span>
                        </div>
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
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
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
                        <p class="text-gray-600 mb-6 text-lg">
                            "El sistema que desarrollaron para nuestro hospital ha revolucionado la forma en que atendemos a nuestros pacientes. 
                            La eficiencia ha aumentado un 40% y la satisfacción del personal médico es excepcional."
                        </p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-semibold">DM</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Dr. Miguel Hernández</p>
                                <p class="text-sm text-gray-500">Director Médico, HealthCare Plus</p>
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
                        <p class="text-gray-600 mb-6 text-lg">
                            "Nuestra plataforma de e-commerce ha crecido exponencialmente desde que SysifosWeb la desarrolló. 
                            Las ventas aumentaron un 300% en el primer año y la experiencia del usuario es fantástica."
                        </p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-semibold">SP</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Sofía Pérez</p>
                                <p class="text-sm text-gray-500">CEO, EcoShop</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Estadísticas -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Nuestros Números
                    </h2>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-blue-600 mb-2">50+</div>
                        <div class="text-gray-600">Proyectos Completados</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-green-600 mb-2">35+</div>
                        <div class="text-gray-600">Clientes Satisfechos</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-purple-600 mb-2">98%</div>
                        <div class="text-gray-600">Satisfacción Cliente</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-cyan-600 mb-2">4</div>
                        <div class="text-gray-600">Años de Experiencia</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tecnologías Utilizadas -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Tecnologías Utilizadas
                    </h2>
                    <p class="text-xl text-gray-600">
                        Stack tecnológico moderno para proyectos de alta calidad
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-6">
                    <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-white font-bold text-sm">React</span>
                        </div>
                        <span class="text-xs font-medium text-gray-700">React</span>
                    </div>
                    <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-white font-bold text-sm">Vue</span>
                        </div>
                        <span class="text-xs font-medium text-gray-700">Vue.js</span>
                    </div>
                    <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-white font-bold text-sm">L</span>
                        </div>
                        <span class="text-xs font-medium text-gray-700">Laravel</span>
                    </div>
                    <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-white font-bold text-sm">Node</span>
                        </div>
                        <span class="text-xs font-medium text-gray-700">Node.js</span>
                    </div>
                    <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-12 h-12 bg-blue-400 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-white font-bold text-sm">RN</span>
                        </div>
                        <span class="text-xs font-medium text-gray-700">React Native</span>
                    </div>
                    <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-white font-bold text-sm">FL</span>
                        </div>
                        <span class="text-xs font-medium text-gray-700">Flutter</span>
                    </div>
                    <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-white font-bold text-sm">AWS</span>
                        </div>
                        <span class="text-xs font-medium text-gray-700">AWS</span>
                    </div>
                    <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition-colors duration-200">
                        <div class="w-12 h-12 bg-blue-700 rounded-lg flex items-center justify-center mb-3">
                            <span class="text-white font-bold text-sm">TS</span>
                        </div>
                        <span class="text-xs font-medium text-gray-700">TypeScript</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="py-20 bg-gradient-to-r from-blue-900 to-cyan-600 text-white">
            <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    ¿Quieres ser Nuestro Próximo Caso de Éxito?
                </h2>
                <p class="text-xl mb-8 text-blue-100">
                    Conversemos sobre tu proyecto y descubre cómo podemos ayudarte a alcanzar tus objetivos
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/contacto" class="bg-white text-blue-900 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition-colors duration-300">
                        Iniciar Proyecto
                    </a>
                    <a href="/servicios" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold text-lg hover:bg-white hover:text-blue-900 transition-colors duration-300">
                        Ver Servicios
                    </a>
                </div>
            </div>
        </section>

        <Footer />
    </div>
</template>
