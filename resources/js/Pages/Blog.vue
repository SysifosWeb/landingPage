<script setup>
import { Head } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import Header from "./Component/Header.vue";
import Footer from "./Component/Footer.vue";

const searchQuery = ref('');
const selectedCategory = ref('all');
const currentPage = ref(1);
const postsPerPage = 6;

const categories = [
    { id: 'all', name: 'Todos', count: 36 },
    { id: 'desarrollo-web', name: 'Desarrollo Web', count: 12 },
    { id: 'apps-moviles', name: 'Apps Móviles', count: 8 },
    { id: 'devops', name: 'DevOps', count: 6 },
    { id: 'ux-ui', name: 'UX/UI', count: 10 }
];

const allPosts = [
    {
        id: 1,
        title: "Las Tendencias de Desarrollo Web para 2024",
        excerpt: "Descubre las tecnologías y metodologías que están definiendo el futuro del desarrollo web este año.",
        category: "desarrollo-web",
        author: "Diego Araya",
        date: "2024-01-15",
        readTime: "8 min",
        image: "../../img/web.webp",
        featured: true,
        tags: ["React", "Vue.js", "AI", "Performance"]
    },
    {
        id: 2,
        title: "Optimización de Performance en React",
        excerpt: "Técnicas avanzadas para mejorar el rendimiento de tus aplicaciones React y ofrecer mejor UX.",
        category: "desarrollo-web",
        author: "Karen Silva",
        date: "2024-01-10",
        readTime: "12 min",
        image: "../../img/webDesign_min.webp",
        featured: false,
        tags: ["React", "Performance", "Optimization"]
    },
    {
        id: 3,
        title: "Flutter vs React Native: Comparativa 2024",
        excerpt: "Análisis completo de las dos principales tecnologías para desarrollo móvil multiplataforma.",
        category: "apps-moviles",
        author: "Osman Torres",
        date: "2024-01-08",
        readTime: "15 min",
        image: "../../img/mobile_min.webp",
        featured: false,
        tags: ["Flutter", "React Native", "Mobile"]
    },
    {
        id: 4,
        title: "Principios de UX/UI para Desarrolladores",
        excerpt: "Guía esencial para desarrolladores que quieren crear interfaces más intuitivas y atractivas.",
        category: "ux-ui",
        author: "María González",
        date: "2024-01-05",
        readTime: "10 min",
        image: "../../img/webDesign_min.webp",
        featured: false,
        tags: ["UX", "UI", "Design", "Frontend"]
    },
    {
        id: 5,
        title: "Docker y Kubernetes en Producción",
        excerpt: "Mejores prácticas para implementar contenedores en entornos de producción empresarial.",
        category: "devops",
        author: "Diego Araya",
        date: "2024-01-03",
        readTime: "18 min",
        image: "../../img/system_m_min.webp",
        featured: false,
        tags: ["Docker", "Kubernetes", "DevOps", "Production"]
    },
    {
        id: 6,
        title: "Arquitectura de Microservicios con Laravel",
        excerpt: "Cómo diseñar y implementar una arquitectura de microservicios escalable usando Laravel.",
        category: "desarrollo-web",
        author: "Osman Torres",
        date: "2023-12-28",
        readTime: "14 min",
        image: "../../img/system_m_min.webp",
        featured: false,
        tags: ["Laravel", "Microservices", "Architecture"]
    }
];

const filteredPosts = computed(() => {
    let posts = allPosts;
    
    // Filter by category
    if (selectedCategory.value !== 'all') {
        posts = posts.filter(post => post.category === selectedCategory.value);
    }
    
    // Filter by search query
    if (searchQuery.value) {
        const query = searchQuery.value.toLowerCase();
        posts = posts.filter(post => 
            post.title.toLowerCase().includes(query) ||
            post.excerpt.toLowerCase().includes(query) ||
            post.tags.some(tag => tag.toLowerCase().includes(query))
        );
    }
    
    return posts;
});

const paginatedPosts = computed(() => {
    const start = (currentPage.value - 1) * postsPerPage;
    const end = start + postsPerPage;
    return filteredPosts.value.slice(start, end);
});

const totalPages = computed(() => {
    return Math.ceil(filteredPosts.value.length / postsPerPage);
});

const featuredPost = computed(() => {
    return allPosts.find(post => post.featured);
});

const setCategory = (categoryId) => {
    selectedCategory.value = categoryId;
    currentPage.value = 1;
};

const setPage = (page) => {
    currentPage.value = page;
    window.scrollTo({ top: 0, behavior: 'smooth' });
};

const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('es-ES', options);
};
</script>

<template>
    <Head title="Blog - SysifosWeb" />
    
    <div class="min-h-screen bg-white">
        <Header />
        
        <!-- Hero Section -->
        <section class="bg-gradient-to-br from-blue-900 via-blue-800 to-cyan-600 text-white py-20 pt-36">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6">
                        Blog de <span class="text-cyan-300">SysifosWeb</span>
                    </h1>
                    <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
                        Insights, tutoriales y tendencias del mundo del desarrollo de software
                    </p>
                </div>
            </div>
        </section>

        <!-- Search and Filters -->
        <section class="py-8 bg-gray-50 border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row gap-6 items-center justify-between">
                    <!-- Search Bar -->
                    <div class="relative flex-1 max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input 
                            v-model="searchQuery"
                            type="text" 
                            placeholder="Buscar artículos..." 
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        />
                    </div>
                    
                    <!-- Category Filters -->
                    <div class="flex flex-wrap gap-2">
                        <button
                            v-for="category in categories"
                            :key="category.id"
                            @click="setCategory(category.id)"
                            :class="[
                                'px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200',
                                selectedCategory === category.id
                                    ? 'bg-blue-600 text-white'
                                    : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-300'
                            ]"
                        >
                            {{ category.name }} ({{ category.count }})
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Article -->
        <section v-if="featuredPost && selectedCategory === 'all' && !searchQuery" class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Artículo Destacado</h2>
                </div>
                
                <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl overflow-hidden shadow-xl">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center p-8 lg:p-12">
                        <div>
                            <div class="flex items-center gap-4 mb-4">
                                <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                    Destacado
                                </span>
                                <span class="text-gray-500 text-sm">{{ formatDate(featuredPost.date) }}</span>
                            </div>
                            <h3 class="text-3xl font-bold text-gray-900 mb-4">{{ featuredPost.title }}</h3>
                            <p class="text-gray-600 text-lg mb-6">{{ featuredPost.excerpt }}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-semibold text-sm">{{ featuredPost.author.split(' ').map(n => n[0]).join('') }}</span>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">{{ featuredPost.author }}</p>
                                        <p class="text-gray-500 text-sm">{{ featuredPost.readTime }} de lectura</p>
                                    </div>
                                </div>
                                <button class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-200">
                                    Leer Artículo
                                </button>
                            </div>
                        </div>
                        <div class="relative">
                            <img :src="featuredPost.image" :alt="featuredPost.title" class="w-full h-64 lg:h-80 object-cover rounded-xl shadow-lg" />
                            <div class="absolute top-4 right-4">
                                <div class="flex flex-wrap gap-2">
                                    <span 
                                        v-for="tag in featuredPost.tags.slice(0, 2)" 
                                        :key="tag"
                                        class="bg-white/90 backdrop-blur-sm text-gray-700 px-2 py-1 rounded text-xs font-medium"
                                    >
                                        {{ tag }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Articles Grid -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between mb-12">
                    <h2 class="text-3xl font-bold text-gray-900">
                        {{ selectedCategory === 'all' ? 'Últimos Artículos' : categories.find(c => c.id === selectedCategory)?.name }}
                    </h2>
                    <p class="text-gray-600">
                        {{ filteredPosts.length }} artículo{{ filteredPosts.length !== 1 ? 's' : '' }} encontrado{{ filteredPosts.length !== 1 ? 's' : '' }}
                    </p>
                </div>

                <!-- Articles Grid -->
                <div v-if="paginatedPosts.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    <article 
                        v-for="post in paginatedPosts" 
                        :key="post.id"
                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 group"
                    >
                        <div class="relative">
                            <img :src="post.image" :alt="post.title" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                            <div class="absolute top-4 left-4">
                                <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                    {{ categories.find(c => c.id === post.category)?.name }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                                <span>{{ formatDate(post.date) }}</span>
                                <span>•</span>
                                <span>{{ post.readTime }}</span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-200">
                                {{ post.title }}
                            </h3>
                            <p class="text-gray-600 mb-4">{{ post.excerpt }}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                        <span class="text-gray-700 font-semibold text-xs">{{ post.author.split(' ').map(n => n[0]).join('') }}</span>
                                    </div>
                                    <span class="text-sm text-gray-700">{{ post.author }}</span>
                                </div>
                                <button class="text-blue-600 hover:text-blue-700 font-medium text-sm transition-colors duration-200">
                                    Leer más →
                                </button>
                            </div>
                            <div class="flex flex-wrap gap-2 mt-4">
                                <span 
                                    v-for="tag in post.tags.slice(0, 3)" 
                                    :key="tag"
                                    class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs"
                                >
                                    {{ tag }}
                                </span>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- No Results -->
                <div v-else class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.47-.881-6.08-2.33"/>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No se encontraron artículos</h3>
                    <p class="text-gray-500">Intenta con otros términos de búsqueda o categorías.</p>
                </div>

                <!-- Pagination -->
                <div v-if="totalPages > 1" class="flex justify-center items-center gap-2">
                    <button 
                        @click="setPage(currentPage - 1)"
                        :disabled="currentPage === 1"
                        :class="[
                            'px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200',
                            currentPage === 1 
                                ? 'bg-gray-100 text-gray-400 cursor-not-allowed' 
                                : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-300'
                        ]"
                    >
                        Anterior
                    </button>
                    
                    <button
                        v-for="page in totalPages"
                        :key="page"
                        @click="setPage(page)"
                        :class="[
                            'px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200',
                            currentPage === page
                                ? 'bg-blue-600 text-white'
                                : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-300'
                        ]"
                    >
                        {{ page }}
                    </button>
                    
                    <button 
                        @click="setPage(currentPage + 1)"
                        :disabled="currentPage === totalPages"
                        :class="[
                            'px-3 py-2 rounded-lg text-sm font-medium transition-colors duration-200',
                            currentPage === totalPages 
                                ? 'bg-gray-100 text-gray-400 cursor-not-allowed' 
                                : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-300'
                        ]"
                    >
                        Siguiente
                    </button>
                </div>
            </div>
        </section>

        <!-- Newsletter Subscription -->
        <section class="py-16 bg-blue-900 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold mb-4">¿No te quieres perder nada?</h2>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Suscríbete a nuestro newsletter y recibe los últimos artículos directamente en tu email
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
                    <input 
                        type="email" 
                        placeholder="Tu email" 
                        class="flex-1 px-4 py-3 rounded-lg text-gray-900 focus:ring-2 focus:ring-cyan-400 focus:outline-none"
                    />
                    <button class="bg-cyan-400 text-blue-900 px-6 py-3 rounded-lg font-semibold hover:bg-cyan-300 transition-colors duration-200">
                        Suscribirse
                    </button>
                </div>
                <p class="text-sm text-blue-200 mt-4">
                    Sin spam. Solo contenido de calidad. Puedes cancelar en cualquier momento.
                </p>
            </div>
        </section>

        <Footer />
    </div>
</template>
