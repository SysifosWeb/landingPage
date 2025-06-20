<script setup>
import { Head } from "@inertiajs/vue3";
import Header from "./Component/Header.vue";
import Footer from "./Component/Footer.vue";
</script>

<template>
    <Head title="Nosotros - SysifosWeb" />
    
    <div class="min-h-screen bg-white">
        <Header />
        
        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-blue-900 to-cyan-600 text-white py-20 pt-36">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    Conoce a SysifosWeb
                </h1>
                <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                    Somos un equipo apasionado por la tecnología, dedicado a transformar ideas en soluciones digitales innovadoras
                </p>
            </div>
        </section>

        <!-- Historia -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                            Nuestra Historia
                        </h2>
                        <p class="text-lg text-gray-600 mb-6">
                            Fundada en 2020, SysifosWeb nació de la visión de democratizar el acceso a la tecnología de vanguardia. 
                            Comenzamos como un pequeño equipo de desarrolladores apasionados y hemos crecido hasta convertirnos en 
                            una empresa líder en desarrollo de software.
                        </p>
                        <p class="text-lg text-gray-600 mb-6">
                            Nuestro nombre, inspirado en el mito de Sísifo, refleja nuestra perseverancia y dedicación para superar 
                            cualquier desafío tecnológico, convirtiendo cada obstáculo en una oportunidad de innovación.
                        </p>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-blue-600">50+</div>
                                <div class="text-gray-600">Proyectos Completados</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-blue-600">35+</div>
                                <div class="text-gray-600">Clientes Satisfechos</div>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="w-full h-96 bg-gradient-to-br from-blue-100 to-cyan-100 rounded-2xl flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-6xl mb-4">🚀</div>
                                <p class="text-gray-600 font-medium">Innovación Constante</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Misión, Visión y Valores -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Nuestros Principios
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Misión</h3>
                        <p class="text-gray-600">
                            Empoderar a las empresas con soluciones tecnológicas innovadoras que impulsen su crecimiento 
                            y mejoren su competitividad en el mercado digital.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Visión</h3>
                        <p class="text-gray-600">
                            Ser la empresa de desarrollo de software más confiable de Latinoamérica, reconocida por 
                            nuestra excelencia técnica y compromiso con la innovación.
                        </p>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-8 text-center">
                        <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Valores</h3>
                        <p class="text-gray-600">
                            Innovación, calidad, transparencia y compromiso con nuestros clientes. Creemos en el 
                            poder de la tecnología para crear un futuro mejor.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Equipo -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Nuestro Equipo
                    </h2>
                    <p class="text-xl text-gray-600">
                        Profesionales apasionados por la tecnología y comprometidos con la excelencia
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-32 h-32 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-white text-2xl font-bold">DA</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Diego Araya</h3>
                        <p class="text-blue-600 font-medium mb-2">Full Stack Developer</p>
                        <p class="text-gray-600 text-sm">
                            Desarrollador full stack especializado en crear aplicaciones web responsivas.
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="w-32 h-32 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-white text-2xl font-bold">KG</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Karen Godoy</h3>
                        <p class="text-green-600 font-medium mb-2">DBA & Frontend Developer</p>
                        <p class="text-gray-600 text-sm">
                            Mi especialidad son las bases de datos y el desarrollo web frontend.
                        </p>
                    </div>

                    <div class="text-center">
                        <div class="w-32 h-32 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-white text-2xl font-bold">OA</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Osman Ahumada</h3>
                        <p class="text-purple-600 font-medium mb-2">Web & Mobile Developer</p>
                        <p class="text-gray-600 text-sm">
                            Desarrollador web, con conocimientos en backend,frontend y desarrollo mobile en flutter.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Metodología -->
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Nuestra Metodología
                    </h2>
                    <p class="text-xl text-gray-600">
                        Aplicamos metodologías ágiles para garantizar entregas de calidad en tiempo y forma
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div>
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold text-sm">1</span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Scrum Framework</h3>
                                    <p class="text-gray-600">Sprints de 2 semanas con entregas incrementales y feedback continuo.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold text-sm">2</span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Comunicación Transparente</h3>
                                    <p class="text-gray-600">Reuniones diarias, demos y retrospectivas para mantener alineación total.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold text-sm">3</span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Calidad Asegurada</h3>
                                    <p class="text-gray-600">Testing automatizado, code reviews y mejores prácticas de desarrollo.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl p-8 shadow-lg">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6 text-center">Stack Tecnológico</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-gray-700">Frontend</span>
                                    <span class="text-sm text-gray-500">React, Vue.js, Angular</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: 95%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-gray-700">Backend</span>
                                    <span class="text-sm text-gray-500">Laravel, Node.js, Python</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-600 h-2 rounded-full" style="width: 90%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-gray-700">Mobile</span>
                                    <span class="text-sm text-gray-500">React Native, Flutter</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-purple-600 h-2 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm font-medium text-gray-700">DevOps</span>
                                    <span class="text-sm text-gray-500">AWS, Docker, CI/CD</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-cyan-600 h-2 rounded-full" style="width: 80%"></div>
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
                    ¿Quieres Conocer Más?
                </h2>
                <p class="text-xl mb-8 text-blue-100">
                    Conversemos sobre cómo podemos ayudarte a alcanzar tus objetivos tecnológicos
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/contacto" class="bg-white text-blue-900 px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition-colors duration-300">
                        Contactar Equipo
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
