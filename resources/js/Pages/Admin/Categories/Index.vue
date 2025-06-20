<template>
    <AdminLayout page-title="Gestión de Categorías">
        <!-- Header con botón de crear -->
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Categorías</h1>
                <p class="mt-1 text-sm text-gray-600">
                    Organiza tus posts por categorías
                </p>
            </div>
            <Link
                :href="route('admin.categories.create')"
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
                Nueva Categoría
            </Link>
        </div>

        <!-- Filtros -->
        <div class="bg-white rounded-lg shadow mb-6">
            <div class="p-6">
                <form
                    @submit.prevent="search"
                    class="grid grid-cols-1 md:grid-cols-3 gap-4"
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
                            placeholder="Nombre, descripción..."
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
                            v-model="filters.active"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                            <option value="">Todas</option>
                            <option value="1">Activas</option>
                            <option value="0">Inactivas</option>
                        </select>
                    </div>

                    <!-- Botones -->
                    <div class="flex items-end space-x-3">
                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                        >
                            Filtrar
                        </button>
                        <button
                            type="button"
                            @click="clearFilters"
                            class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150"
                        >
                            Limpiar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Grid de categorías -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div
                v-for="category in categories.data"
                :key="category.id"
                class="bg-white rounded-lg shadow hover:shadow-md transition-shadow duration-200"
            >
                <div class="p-6">
                    <!-- Header de la categoría -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div
                                class="w-4 h-4 rounded-full mr-3"
                                :style="{ backgroundColor: category.color }"
                            ></div>
                            <h3 class="text-lg font-medium text-gray-900">
                                {{ category.name }}
                            </h3>
                        </div>
                        <div class="flex items-center space-x-2">
                            <!-- Estado -->
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                :class="
                                    category.active
                                        ? 'bg-green-100 text-green-800'
                                        : 'bg-red-100 text-red-800'
                                "
                            >
                                {{ category.active ? "Activa" : "Inactiva" }}
                            </span>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <p
                        v-if="category.description"
                        class="text-sm text-gray-600 mb-4"
                    >
                        {{ category.description }}
                    </p>
                    <p v-else class="text-sm text-gray-400 italic mb-4">
                        Sin descripción
                    </p>

                    <!-- Estadísticas -->
                    <div
                        class="flex items-center justify-between text-sm text-gray-500 mb-4"
                    >
                        <span>{{ category.blog_posts_count }} posts</span>
                        <span>Orden: {{ category.sort_order }}</span>
                    </div>

                    <!-- Acciones -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <!-- Ver -->
                            <Link
                                :href="
                                    route('admin.categories.show', category.id)
                                "
                                class="text-blue-600 hover:text-blue-900"
                                title="Ver categoría"
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
                                    route('admin.categories.edit', category.id)
                                "
                                class="text-indigo-600 hover:text-indigo-900"
                                title="Editar categoría"
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

                            <!-- Toggle Activo -->
                            <button
                                @click="toggleActive(category)"
                                :class="
                                    category.active
                                        ? 'text-orange-600 hover:text-orange-900'
                                        : 'text-green-600 hover:text-green-900'
                                "
                                :title="
                                    category.active ? 'Desactivar' : 'Activar'
                                "
                            >
                                <svg
                                    v-if="category.active"
                                    class="h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728"
                                    />
                                </svg>
                                <svg
                                    v-else
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

                            <!-- Eliminar -->
                            <button
                                @click="deleteCategory(category)"
                                class="text-red-600 hover:text-red-900"
                                title="Eliminar categoría"
                                :disabled="category.blog_posts_count > 0"
                                :class="{
                                    'opacity-50 cursor-not-allowed':
                                        category.blog_posts_count > 0,
                                }"
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
                    </div>
                </div>
            </div>
        </div>

        <!-- Paginación -->
        <div v-if="categories.links" class="bg-white rounded-lg shadow">
            <div class="px-4 py-3 border-t border-gray-200 sm:px-6">
                <div class="flex items-center justify-between">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <Link
                            v-if="categories.prev_page_url"
                            :href="categories.prev_page_url"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                        >
                            Anterior
                        </Link>
                        <Link
                            v-if="categories.next_page_url"
                            :href="categories.next_page_url"
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
                                    categories.from
                                }}</span>
                                a
                                <span class="font-medium">{{
                                    categories.to
                                }}</span>
                                de
                                <span class="font-medium">{{
                                    categories.total
                                }}</span>
                                resultados
                            </p>
                        </div>
                        <div>
                            <nav
                                class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                            >
                                <template
                                    v-for="(link, index) in categories.links"
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
                                            index ===
                                            categories.links.length - 1
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
                                            index ===
                                            categories.links.length - 1
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

<script setup>
import { ref, reactive } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import AdminLayout from '../Layout.vue'
import { route } from '../../../utils/route.js'

const props = defineProps({
    categories: Object,
    filters: Object,
});

const filters = reactive({
    search: props.filters.search || "",
    active: props.filters.active || "",
});

const search = () => {
    router.get(route("admin.categories.index"), filters, {
        preserveState: true,
        replace: true,
    });
};

const clearFilters = () => {
    Object.keys(filters).forEach((key) => {
        filters[key] = "";
    });
    search();
};

const toggleActive = (category) => {
    router.post(
        route("admin.categories.toggle-active", category.id),
        {},
        {
            preserveScroll: true,
        }
    );
};

const deleteCategory = (category) => {
    if (category.blog_posts_count > 0) {
        alert("No se puede eliminar una categoría que tiene posts asociados.");
        return;
    }

    if (confirm("¿Estás seguro de que quieres eliminar esta categoría?")) {
        router.delete(route("admin.categories.destroy", category.id));
    }
};
</script>
