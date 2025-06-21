<script setup>
import { ref, reactive, watch, computed } from "vue";
import { Link, router } from "@inertiajs/vue3";
import AdminLayout from "../Layout.vue";
import { route } from "../../../utils/route.js";

const props = defineProps({
    posts: Object,
    categories: Array,
    filters: Object,
});

const filters = reactive({
    search: props.filters.search || "",
    status: props.filters.status || "",
    category: props.filters.category || "",
    featured: props.filters.featured || "",
});

// Detectar si hay filtros activos
const hasActiveFilters = computed(() => {
    return filters.search || filters.status || filters.category || filters.featured;
});

const search = () => {
    router.get(route("admin.posts.index"), filters, {
        preserveState: true,
        replace: true,
        only: ['posts'],
    });
};

const clearFilters = () => {
    Object.keys(filters).forEach((key) => {
        filters[key] = "";
    });
    search();
};

// Auto-filtrar cuando cambian los valores
const autoFilter = () => {
    search();
};

// Búsqueda con delay para evitar demasiadas peticiones
let searchTimeout = null;
watch(() => filters.search, (newValue) => {
    if (searchTimeout) {
        clearTimeout(searchTimeout);
    }
    searchTimeout = setTimeout(() => {
        search();
    }, 500); // 500ms de delay
});

const toggleFeatured = (post) => {
    router.post(
        route("admin.posts.toggle-featured", post.id),
        {},
        {
            preserveScroll: true,
            only: ['posts'],
            onError: (errors) => {
                console.error('❌ Error en toggle featured:', errors);
                alert('Error al cambiar el estado destacado del post');
            }
        }
    );
};

const publishPost = (post) => {
    router.post(
        route("admin.posts.publish", post.id),
        {},
        {
            preserveScroll: true,
            only: ['posts'],
            onError: (errors) => {
                console.error('❌ Error al publicar:', errors);
                alert('Error al publicar el post');
            }
        }
    );
};

const unpublishPost = (post) => {
    router.post(
        route("admin.posts.unpublish", post.id),
        {},
        {
            preserveScroll: true,
            only: ['posts'],
            onError: (errors) => {
                console.error('❌ Error al despublicar:', errors);
                alert('Error al despublicar el post');
            }
        }
    );
};

const deletePost = (post) => {
    if (confirm(`¿Estás seguro de que quieres eliminar el post "${post.title}"?`)) {
        router.delete(route("admin.posts.destroy", post.id), {
            only: ['posts'],
            onError: (errors) => {
                console.error('❌ Error al eliminar:', errors);
                alert('Error al eliminar el post');
            }
        });
    }
};

const getStatusClass = (status) => {
    return (
        {
            draft: "bg-yellow-100 text-yellow-800",
            published: "bg-green-100 text-green-800",
        }[status] || "bg-gray-100 text-gray-800"
    );
};

const getStatusText = (status) => {
    return (
        {
            draft: "Borrador",
            published: "Publicado",
        }[status] || "Desconocido"
    );
};

const formatNumber = (number) => {
    return new Intl.NumberFormat("es-CL").format(number);
};

const formatDate = (date) => {
    return new Date(date).toLocaleDateString("es-CL", {
        year: "numeric",
        month: "short",
        day: "numeric",
    });
};
</script>

<template>
    <AdminLayout page-title="Gestión de Posts">
        <!-- Header con botón de crear -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">
                    Posts del Blog
                </h1>
                <p class="mt-1 text-sm text-gray-600">
                    Gestiona todos los posts de tu blog
                </p>
            </div>
            <Link
                :href="route('admin.posts.create')"
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            >
                <svg
                    class="h-4 w-4 mr-2"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 4v16m8-8H4"
                    />
                </svg>
                Nuevo Post
            </Link>
        </div>

        <!-- Filtros -->
        <div class="bg-white rounded-lg shadow mb-6">
            <div class="p-6">
                <form
                    @submit.prevent="search"
                    class="grid grid-cols-1 md:grid-cols-4 gap-4"
                >
                    <!-- Búsqueda -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Buscar</label
                        >
                        <input
                            v-model="filters.search"
                            type="text"
                            placeholder="Título, contenido..."
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        />
                    </div>

                    <!-- Estado -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Estado</label
                        >
                        <select
                            v-model="filters.status"
                            @change="autoFilter"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                            <option value="">Todos los estados</option>
                            <option value="draft">Borrador</option>
                            <option value="published">Publicado</option>
                        </select>
                    </div>

                    <!-- Categoría -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Categoría</label
                        >
                        <select
                            v-model="filters.category"
                            @change="autoFilter"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                            <option value="">Todas las categorías</option>
                            <option
                                v-for="category in categories"
                                :key="category.id"
                                :value="category.id"
                            >
                                {{ category.name }}
                            </option>
                        </select>
                    </div>

                    <!-- Destacado -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Destacado</label
                        >
                        <select
                            v-model="filters.featured"
                            @change="autoFilter"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                            <option value="">Todos</option>
                            <option value="1">Solo destacados</option>
                            <option value="0">No destacados</option>
                        </select>
                    </div>

                    <!-- Botones y estadísticas -->
                    <div class="md:col-span-4 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <button
                                type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            >
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Filtrar
                            </button>
                            <button
                                type="button"
                                @click="clearFilters"
                                v-if="hasActiveFilters"
                                class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            >
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Limpiar Filtros
                            </button>
                        </div>
                        
                        <!-- Estadísticas de filtros -->
                        <div class="text-sm text-gray-600">
                            <span class="font-medium">{{ posts.total }}</span> 
                            {{ posts.total === 1 ? 'post encontrado' : 'posts encontrados' }}
                            <span v-if="hasActiveFilters" class="ml-2 text-blue-600">
                                (filtrado)
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabla de posts -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Post
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Categoría
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Estado
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Vistas
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Fecha
                            </th>
                            <th
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr
                            v-for="post in posts.data"
                            :key="post.id"
                            class="hover:bg-gray-50"
                        >
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-12 w-12">
                                        <img
                                            :src="
                                                post.featured_image_url ||
                                                '/images/blog-default.jpg'
                                            "
                                            :alt="post.title"
                                            class="h-12 w-12 rounded-lg object-cover"
                                        />
                                    </div>
                                    <div class="ml-4">
                                        <div
                                            class="text-sm font-medium text-gray-900"
                                        >
                                            {{ post.title }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            por
                                            {{ post.user?.name || "Usuario" }}
                                        </div>
                                        <div
                                            v-if="post.featured"
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 mt-1"
                                        >
                                            ⭐ Destacado
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    v-if="post.category"
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                    :style="{
                                        backgroundColor:
                                            post.category.color + '20',
                                        color: post.category.color,
                                    }"
                                >
                                    {{ post.category.name }}
                                </span>
                                <span v-else class="text-gray-400"
                                    >Sin categoría</span
                                >
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                    :class="getStatusClass(post.status)"
                                >
                                    {{ getStatusText(post.status) }}
                                </span>
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                            >
                                {{ formatNumber(post.views) }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{ formatDate(post.created_at) }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                            >
                                <div
                                    class="flex items-center justify-end space-x-2"
                                >
                                    <!-- Ver -->
                                    <Link
                                        :href="
                                            route('admin.posts.show', post.id)
                                        "
                                        class="text-blue-600 hover:text-blue-900"
                                        title="Ver post"
                                    >
                                        <svg
                                            class="h-4 w-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                            />
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                            />
                                        </svg>
                                    </Link>

                                    <!-- Editar -->
                                    <Link
                                        :href="
                                            route('admin.posts.edit', post.id)
                                        "
                                        class="text-indigo-600 hover:text-indigo-900"
                                        title="Editar post"
                                    >
                                        <svg
                                            class="h-4 w-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                            />
                                        </svg>
                                    </Link>

                                    <!-- Toggle Destacado -->
                                    <button
                                        @click="toggleFeatured(post)"
                                        :class="
                                            post.featured
                                                ? 'text-yellow-600 hover:text-yellow-900'
                                                : 'text-gray-400 hover:text-yellow-600'
                                        "
                                        :title="
                                            post.featured
                                                ? 'Quitar de destacados'
                                                : 'Marcar como destacado'
                                        "
                                    >
                                        <svg
                                            class="h-4 w-4"
                                            fill="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                                            />
                                        </svg>
                                    </button>

                                    <!-- Toggle Publicación -->
                                    <button
                                        v-if="post.status === 'draft'"
                                        @click="publishPost(post)"
                                        class="text-green-600 hover:text-green-900"
                                        title="Publicar"
                                    >
                                        <svg
                                            class="h-4 w-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 13l4 4L19 7"
                                            />
                                        </svg>
                                    </button>
                                    <button
                                        v-else
                                        @click="unpublishPost(post)"
                                        class="text-orange-600 hover:text-orange-900"
                                        title="Despublicar"
                                    >
                                        <svg
                                            class="h-4 w-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 4h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17.294 15M10 14l4-2 4-2m-8 4l-2 2m2-2l2 2"
                                            />
                                        </svg>
                                    </button>

                                    <!-- Eliminar -->
                                    <button
                                        @click="deletePost(post)"
                                        class="text-red-600 hover:text-red-900"
                                        title="Eliminar post"
                                    >
                                        <svg
                                            class="h-4 w-4"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div
                v-if="posts.links"
                class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6"
            >
                <div class="flex items-center justify-between">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <Link
                            v-if="posts.prev_page_url"
                            :href="posts.prev_page_url"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                        >
                            Anterior
                        </Link>
                        <Link
                            v-if="posts.next_page_url"
                            :href="posts.next_page_url"
                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                        >
                            Siguiente
                        </Link>
                    </div>
                    <div
                        class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"
                    >
                        <div>
                            <p class="text-sm text-gray-700">
                                Mostrando
                                <span class="font-medium">{{
                                    posts.from
                                }}</span>
                                a
                                <span class="font-medium">{{ posts.to }}</span>
                                de
                                <span class="font-medium">{{
                                    posts.total
                                }}</span>
                                resultados
                            </p>
                        </div>
                        <div>
                            <nav
                                class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                            >
                                <template
                                    v-for="(link, index) in posts.links"
                                    :key="index"
                                >
                                    <Link
                                        v-if="link.url"
                                        :href="link.url"
                                        :class="[
                                            'relative inline-flex items-center px-4 py-2 border text-sm font-medium',
                                            link.active
                                                ? 'z-10 bg-blue-50 border-blue-500 text-blue-600'
                                                : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50',
                                            index === 0 ? 'rounded-l-md' : '',
                                            index === posts.links.length - 1
                                                ? 'rounded-r-md'
                                                : '',
                                        ]"
                                        v-html="link.label"
                                    >
                                    </Link>
                                    <span
                                        v-else
                                        :class="[
                                            'relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500',
                                            index === 0 ? 'rounded-l-md' : '',
                                            index === posts.links.length - 1
                                                ? 'rounded-r-md'
                                                : '',
                                        ]"
                                        v-html="link.label"
                                    >
                                    </span>
                                </template>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<style scoped>
</style>
