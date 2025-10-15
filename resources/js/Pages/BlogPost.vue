<script setup>
import { Head } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import Header from "./Component/Header.vue";
import Footer from "./Component/Footer.vue";

// Props que vienen del backend
const props = defineProps({
    post: Object,
    relatedPosts: Array
});
console.log(props.post);
const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('es-ES', options);
};

const getImageUrl = (post) => {
    return post?.featured_image || '/img/blog-default.jpg';
};

const getPostUrl = (post) => {
    return `/blog/${post.slug}`;
};

const getCurrentUrl = () => {
    if (typeof window !== 'undefined') {
        return window.location.href;
    }
    // Fallback para SSR - construir URL manualmente
    return `https://sysifosweb.cl/blog/${props.post.slug}`;
};

// Canonical estable en dominio de producción
const getCanonicalUrl = () => {
    return `https://sysifosweb.cl/blog/${props.post.slug}`;
};

// Keywords finales con fallback cuando no hay meta_keywords
const finalKeywordsString = computed(() => {
    const provided = Array.isArray(props.post.meta_keywords)
        ? props.post.meta_keywords
        : typeof props.post.meta_keywords === 'string' && props.post.meta_keywords.length
            ? props.post.meta_keywords.split(',').map(k => k.trim()).filter(Boolean)
            : [];

    const fallback = [
        props.post.category?.name,
        props.post.title,
        'blog de desarrollo',
        'desarrollo web',
        'tutorial',
        'guía',
        'mejores prácticas',
        'Laravel',
        'Vue.js',
        'React',
        'SysifosWeb',
    ].filter(Boolean);

    const unique = Array.from(new Set([...provided, ...fallback]));
    return unique.join(', ');
});

const shareOnTwitter = () => {
    if (typeof window === 'undefined') return;
    const url = encodeURIComponent(getCurrentUrl());
    const text = encodeURIComponent(`${props.post.title} - ${props.post.excerpt}`);
    window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank');
};

const shareOnFacebook = () => {
    if (typeof window === 'undefined') return;
    const url = encodeURIComponent(getCurrentUrl());
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
};

const shareOnLinkedIn = () => {
    if (typeof window === 'undefined') return;
    const url = encodeURIComponent(getCurrentUrl());
    const title = encodeURIComponent(props.post.title);
    window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}&title=${title}`, '_blank');
};

const copyToClipboard = async () => {
    if (typeof window === 'undefined') return;
    try {
        await navigator.clipboard.writeText(getCurrentUrl());
        alert('¡Enlace copiado al portapapeles!');
    } catch (err) {
        console.error('Error al copiar:', err);
        // Fallback para navegadores que no soportan clipboard API
        const textArea = document.createElement('textarea');
        textArea.value = getCurrentUrl();
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        alert('¡Enlace copiado al portapapeles!');
    }
};
</script>

<template>
    <Head>
        <title>{{ post.meta_title || post.title }} - SysifosWeb</title>
        <meta name="description" :content="post.meta_description || post.excerpt">
        <meta name="keywords" :content="finalKeywordsString">
        <meta name="robots" content="index, follow">
        <link rel="canonical" :href="getCanonicalUrl()">
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="article">
        <meta property="og:title" :content="post.title">
        <meta property="og:description" :content="post.excerpt">
        <meta property="og:url" :content="getCanonicalUrl()">
        <meta property="og:image" :content="getImageUrl(post)">
        
        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" :content="post.title">
        <meta name="twitter:description" :content="post.excerpt">
        <meta name="twitter:image" :content="getImageUrl(post)">
    </Head>
    
    <div class="min-h-screen bg-white">
        <Header />
        
        <!-- Hero Section -->
        <section class="bg-gradient-to-br from-blue-900 via-blue-800 to-cyan-600 text-white py-16 pt-32">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Breadcrumb -->
                <nav class="mb-8">
                    <ol class="flex items-center space-x-2 text-blue-200">
                        <li><a href="/" class="hover:text-white transition-colors">Inicio</a></li>
                        <li><span class="mx-2">/</span></li>
                        <li><a href="/blog" class="hover:text-white transition-colors">Blog</a></li>
                        <li><span class="mx-2">/</span></li>
                        <li class="text-white">{{ post.title }}</li>
                    </ol>
                </nav>
                
                <!-- Category Badge -->
                <div class="mb-4">
                    <span class="bg-cyan-400 text-blue-900 px-3 py-1 rounded-full text-sm font-medium">
                        {{ post.category?.name || 'General' }}
                    </span>
                    <span v-if="post.featured" class="ml-2 bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full text-sm font-medium">
                        Destacado
                    </span>
                </div>
                
                <!-- Title -->
                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                    {{ post.title }}
                </h1>
                
                <!-- Excerpt -->
                <p class="text-xl text-blue-100 mb-8 max-w-3xl">
                    {{ post.excerpt }}
                </p>
                
                <!-- Meta Information -->
                <div class="flex flex-wrap items-center gap-6 text-blue-200">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-blue-700 rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold">{{ post.user?.name ? post.user.name.split(' ').map(n => n[0]).join('') : 'A' }}</span>
                        </div>
                        <div>
                            <p class="font-semibold text-white">{{ post.user?.name || 'Autor' }}</p>
                            <p class="text-sm">{{ formatDate(post.published_at || post.created_at) }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 text-sm">
                        <span>{{ post.reading_time || '5 min de lectura' }}</span>
                        <span>•</span>
                        <span>{{ post.views || 0 }} vistas</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <article class="py-16">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Featured Image -->
                <div v-if="post.featured_image" class="mb-12">
                    <img :src="getImageUrl(post)" :alt="post.title" class="w-full h-64 md:h-96 object-cover rounded-xl shadow-lg" />
                </div>
                
                <!-- Article Content -->
                <div class="prose prose-lg max-w-none mb-12">
                    <div v-html="post.content" class="article-content"></div>
                </div>
                
                <!-- Tags/Keywords -->
                <div v-if="post.meta_keywords && post.meta_keywords.length > 0" class="mb-12">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Etiquetas</h3>
                    <div class="flex flex-wrap gap-2">
                        <span 
                            v-for="keyword in post.meta_keywords" 
                            :key="keyword"
                            class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm"
                        >
                            {{ keyword }}
                        </span>
                    </div>
                </div>
                
                <!-- Share Buttons -->
                <div class="border-t border-b border-gray-200 py-8 mb-12">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Compartir este artículo</h3>
                    <div class="flex flex-wrap gap-4">
                        <button 
                            @click="shareOnTwitter"
                            class="flex items-center gap-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors"
                        >
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                            Twitter
                        </button>
                        
                        <button 
                            @click="shareOnFacebook"
                            class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors"
                        >
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            Facebook
                        </button>
                        
                        <button 
                            @click="shareOnLinkedIn"
                            class="flex items-center gap-2 bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors"
                        >
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                            LinkedIn
                        </button>
                        
                        <button 
                            @click="copyToClipboard"
                            class="flex items-center gap-2 bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                            Copiar enlace
                        </button>
                    </div>
                </div>
                
                <!-- Author Bio -->
                <div class="bg-gray-50 rounded-xl p-8 mb-12">
                    <div class="flex items-start gap-6">
                        <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold text-xl">{{ post.user?.name ? post.user.name.split(' ').map(n => n[0]).join('') : 'A' }}</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ post.user?.name || 'Autor' }}</h3>
                            <p class="text-gray-600 mb-4">
                                Especialista en desarrollo web y tecnologías modernas. Apasionado por crear soluciones innovadoras y compartir conocimiento con la comunidad.
                            </p>
                            <div class="flex items-center gap-4 text-sm text-gray-500">
                                <span>Miembro desde {{ formatDate(post.user?.created_at) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <!-- Related Posts -->
        <section v-if="relatedPosts && relatedPosts.length > 0" class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Artículos Relacionados</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <article 
                        v-for="relatedPost in relatedPosts" 
                        :key="relatedPost.id"
                        class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 group"
                    >
                        <div class="relative">
                            <img :src="getImageUrl(relatedPost)" :alt="relatedPost.title" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                            <div class="absolute top-4 left-4">
                                <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                    {{ relatedPost.category?.name || 'General' }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                                <span>{{ formatDate(relatedPost.published_at || relatedPost.created_at) }}</span>
                                <span>•</span>
                                <span>{{ relatedPost.reading_time || '5 min de lectura' }}</span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-200">
                                <a :href="getPostUrl(relatedPost)">{{ relatedPost.title }}</a>
                            </h3>
                            <p class="text-gray-600 mb-4">{{ relatedPost.excerpt }}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                        <span class="text-gray-700 font-semibold text-xs">{{ relatedPost.user?.name ? relatedPost.user.name.split(' ').map(n => n[0]).join('') : 'A' }}</span>
                                    </div>
                                    <span class="text-sm text-gray-700">{{ relatedPost.user?.name || 'Autor' }}</span>
                                </div>
                                <a :href="getPostUrl(relatedPost)" class="text-blue-600 hover:text-blue-700 font-medium text-sm transition-colors duration-200">
                                    Leer más →
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Newsletter Subscription -->
        <section class="py-16 bg-blue-900 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold mb-4">¿Te gustó este artículo?</h2>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Suscríbete a nuestro newsletter y recibe más contenido como este directamente en tu email
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

<style scoped>
/* Estilos para el contenido del artículo */
@reference "../../css/app.css";
:deep(.article-content) {
    @apply text-gray-800 leading-relaxed;
}

:deep(.article-content h1) {
    @apply text-3xl font-bold text-gray-900 mt-8 mb-6;
}

:deep(.article-content h2) {
    @apply text-2xl font-bold text-gray-900 mt-8 mb-4;
}

:deep(.article-content h3) {
    @apply text-xl font-semibold text-gray-900 mt-6 mb-3;
}

:deep(.article-content p) {
    @apply mb-4 text-lg leading-relaxed;
}

:deep(.article-content ul) {
    @apply list-disc list-inside mb-4 space-y-2;
}

:deep(.article-content ol) {
    @apply list-decimal list-inside mb-4 space-y-2;
}

:deep(.article-content li) {
    @apply text-lg;
}

:deep(.article-content blockquote) {
    @apply border-l-4 border-blue-500 pl-6 italic text-gray-700 my-6;
}

:deep(.article-content code) {
    @apply bg-gray-100 px-2 py-1 rounded text-sm font-mono;
}

:deep(.article-content pre) {
    @apply bg-gray-900 text-white p-4 rounded-lg overflow-x-auto my-6;
}

:deep(.article-content img) {
    @apply rounded-lg shadow-md my-6 max-w-full h-auto;
}

:deep(.article-content a) {
    @apply text-blue-600 hover:text-blue-800 underline;
}
</style>