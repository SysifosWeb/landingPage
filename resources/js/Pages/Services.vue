<script setup>
import { Head } from "@inertiajs/vue3";
import Header from "./Component/Header.vue";
import Footer from "./Component/Footer.vue";
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
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <!-- Desarrollo Web -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 hover:shadow-xl transition-shadow duration-300">
                        <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Desarrollo Web</h3>
                        <p class="text-gray-600 mb-6">
                            Creamos sitios web modernos, responsivos y optimizados para SEO que convierten visitantes en clientes.
                        </p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Landing Pages de Alto Impacto
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                E-commerce Completo
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Aplicaciones Web Complejas
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                CMS Personalizados
                            </li>
                        </ul>
                        <div class="text-sm text-gray-500 mb-4">
                            <strong>Tecnologías:</strong> React, Vue.js, Laravel, Node.js, TypeScript
                        </div>
                        <a href="/contacto" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-200 inline-block">
                            Solicitar Cotización
                        </a>
                    </div>

                    <!-- Aplicaciones Móviles -->
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 hover:shadow-xl transition-shadow duration-300">
                        <div class="w-16 h-16 bg-green-600 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Aplicaciones Móviles</h3>
                        <p class="text-gray-600 mb-6">
                            Desarrollamos apps nativas e híbridas para iOS y Android con experiencia de usuario excepcional.
                        </p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Apps iOS y Android Nativas
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Aplicaciones Híbridas
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Progressive Web Apps (PWA)
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Integración con APIs
                            </li>
                        </ul>
                        <div class="text-sm text-gray-500 mb-4">
                            <strong>Tecnologías:</strong> React Native, Flutter, Swift, Kotlin
                        </div>
                        <a href="/contacto" class="bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors duration-200 inline-block">
                            Solicitar Cotización
                        </a>
                    </div>

                    <!-- Sistemas Empresariales -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8 hover:shadow-xl transition-shadow duration-300">
                        <div class="w-16 h-16 bg-purple-600 rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Sistemas Empresariales</h3>
                        <p class="text-gray-600 mb-6">
                            Desarrollamos ERP, CRM y sistemas personalizados que optimizan los procesos de tu empresa.
                        </p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                ERP Personalizados
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Sistemas CRM
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Automatización de Procesos
                            </li>
                            <li class="flex items-center text-gray-700">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Integración de Sistemas
                            </li>
                        </ul>
                        <div class="text-sm text-gray-500 mb-4">
                            <strong>Tecnologías:</strong> Laravel, Python, .NET, Microservicios
                        </div>
                        <a href="/contacto" class="bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors duration-200 inline-block">
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
                        <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-white text-2xl font-bold">1</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Análisis y Planificación</h3>
                        <p class="text-gray-600">
                            Entendemos tus necesidades, definimos objetivos y creamos una estrategia detallada para tu proyecto.
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="w-20 h-20 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-white text-2xl font-bold">2</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Diseño UX/UI</h3>
                        <p class="text-gray-600">
                            Creamos wireframes, prototipos y diseños que reflejan la identidad de tu marca y optimizan la experiencia del usuario.
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="w-20 h-20 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-white text-2xl font-bold">3</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Desarrollo Ágil</h3>
                        <p class="text-gray-600">
                            Programamos con sprints de 2 semanas, entregas incrementales y feedback continuo para asegurar la calidad.
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="w-20 h-20 bg-cyan-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-white text-2xl font-bold">4</span>
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
