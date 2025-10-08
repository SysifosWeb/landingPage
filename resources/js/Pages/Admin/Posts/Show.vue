<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";
import AdminLayout from "../Layout.vue";
import { route } from '../../../utils/route.js'

const props = defineProps({
    post: {
        type: Object,
        required: true
    }
});

const statusClass = computed(() => {
    return props.post.status === 'published' 
        ? 'bg-green-100 text-green-800' 
        : 'bg-yellow-100 text-yellow-800';
});

const statusText = computed(() => {
    return props.post.status === 'published' ? 'Publicado' : 'Borrador';
});

const formatDate = (date) => {
    return new Date(date).toLocaleDateString("es-CL", {
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit"
    });
};
</script>

<template>
    <AdminLayout :page-title="`Post: ${post.title}`">
        <div class="max-w-4xl mx-auto">
            <div class="mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">
                            {{ post.title }}
                        </h1>
                        <p class="mt-1 text-sm text-gray-600">
                            Visualización del post
                        </p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <Link
                            :href="route('admin.posts.edit', post.id)"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700"
                        >
                            Editar
                        </Link>
                        <Link
                            :href="route('admin.posts.index')"
                            class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700"
                        >
                            Volver
                        </Link>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2">
                    <!-- Imagen destacada -->
                    <div v-if="post.featured_image_url" class="mb-6">
                        <img 
                            :src="post.featured_image_url" 
                            :alt="post.title"
                            class="w-full h-64 object-cover rounded-lg shadow"
                        />
                    </div>

                    <!-- Contenido principal -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">
                                Contenido del Post
                            </h3>
                        </div>
                        <div class="p-6">
                            <!-- Extracto -->
                            <div v-if="post.excerpt" class="mb-6">
                                <h4 class="text-sm font-medium text-gray-700 mb-2">Extracto</h4>
                                <p class="text-gray-600 italic">{{ post.excerpt }}</p>
                            </div>

                            <!-- Contenido -->
                            <div class="prose max-w-none">
                                <div v-html="post.content"></div>
                            </div>
                        </div>
                    </div>

                    <!-- SEO -->
                    <div v-if="post.meta_title || post.meta_description || post.meta_keywords" class="bg-white rounded-lg shadow mt-6">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">
                                Información SEO
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div v-if="post.meta_title">
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Meta Título
                                </label>
                                <p class="text-gray-900">{{ post.meta_title }}</p>
                            </div>
                            <div v-if="post.meta_description">
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Meta Descripción
                                </label>
                                <p class="text-gray-900">{{ post.meta_description }}</p>
                            </div>
                            <div v-if="post.meta_keywords && post.meta_keywords.length">
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Palabras Clave
                                </label>
                                <div class="flex flex-wrap gap-2">
                                    <span 
                                        v-for="keyword in post.meta_keywords" 
                                        :key="keyword"
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800"
                                    >
                                        {{ keyword }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <!-- Información del post -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">
                                Información
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Estado
                                </label>
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                    :class="statusClass"
                                >
                                    {{ statusText }}
                                </span>
                            </div>

                            <div v-if="post.category">
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Categoría
                                </label>
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-white"
                                    :style="{ backgroundColor: post.category.color }"
                                >
                                    {{ post.category.name }}
                                </span>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Autor
                                </label>
                                <p class="text-gray-900">{{ post.user?.name || 'Usuario' }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Slug
                                </label>
                                <code class="px-2 py-1 bg-gray-100 rounded text-sm">
                                    /blog/{{ post.slug }}
                                </code>
                            </div>

                            <div v-if="post.featured" class="flex items-center">
                                <svg class="w-5 h-5 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span class="text-sm text-gray-600">Post destacado</span>
                            </div>
                        </div>
                    </div>

                    <!-- Estadísticas -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">
                                Estadísticas
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600">
                                    {{ post.views?.toLocaleString() || 0 }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    Visualizaciones
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Creado
                                </label>
                                <p class="text-sm text-gray-600">{{ formatDate(post.created_at) }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Actualizado
                                </label>
                                <p class="text-sm text-gray-600">{{ formatDate(post.updated_at) }}</p>
                            </div>

                            <div v-if="post.published_at">
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Publicado
                                </label>
                                <p class="text-sm text-gray-600">{{ formatDate(post.published_at) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Acciones rápidas -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">
                                Acciones
                            </h3>
                        </div>
                        <div class="p-6 space-y-3">
                            <a
                                :href="`/blog/${post.slug}`"
                                target="_blank"
                                class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700"
                            >
                                Ver en el sitio
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<style scoped>
.prose {
    max-width: none;
}

.prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
    color: #1f2937;
    font-weight: 600;
    margin-top: 1.5em;
    margin-bottom: 0.5em;
}

.prose p {
    margin-bottom: 1em;
    line-height: 1.6;
}

.prose ul, .prose ol {
    margin-bottom: 1em;
    padding-left: 1.5em;
}

.prose li {
    margin-bottom: 0.5em;
}

.prose blockquote {
    border-left: 4px solid #e5e7eb;
    padding-left: 1em;
    margin: 1.5em 0;
    font-style: italic;
    color: #6b7280;
}

.prose code {
    background-color: #f3f4f6;
    padding: 0.2em 0.4em;
    border-radius: 0.25rem;
    font-size: 0.875em;
}

.prose pre {
    background-color: #1f2937;
    color: #f9fafb;
    padding: 1em;
    border-radius: 0.5rem;
    overflow-x: auto;
    margin: 1.5em 0;
}

.prose img {
    max-width: 100%;
    height: auto;
    border-radius: 0.5rem;
    margin: 1.5em 0;
}
</style> 