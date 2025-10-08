<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";
import AdminLayout from "../Layout.vue";
import { route } from '../../../utils/route.js'

const props = defineProps({
    category: {
        type: Object,
        required: true
    }
});

const statusClass = computed(() => {
    return props.category.active 
        ? 'bg-green-100 text-green-800' 
        : 'bg-red-100 text-red-800';
});

const statusText = computed(() => {
    return props.category.active ? 'Activa' : 'Inactiva';
});
</script>

<template>
    <AdminLayout :page-title="`Categoría: ${category.name}`">
        <div class="max-w-4xl mx-auto">
            <div class="mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">
                            {{ category.name }}
                        </h1>
                        <p class="mt-1 text-sm text-gray-600">
                            Detalles y estadísticas de la categoría
                        </p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <Link
                            :href="route('admin.categories.edit', category.id)"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                        >
                            Editar
                        </Link>
                        <Link
                            :href="route('admin.categories.index')"
                            class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150"
                        >
                            Volver
                        </Link>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">
                                Información de la Categoría
                            </h3>
                        </div>
                        <div class="p-6 space-y-6">
                            <div class="flex items-center space-x-4">
                                <div
                                    class="w-8 h-8 rounded-full border border-gray-300"
                                    :style="{ backgroundColor: category.color }"
                                ></div>
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-900">
                                        {{ category.name }}
                                    </h2>
                                    <p class="text-sm text-gray-500">
                                        Color: {{ category.color }}
                                    </p>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Slug (URL)
                                </label>
                                <code class="px-3 py-1 bg-gray-100 rounded text-sm">
                                    /blog/categoria/{{ category.slug }}
                                </code>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Descripción
                                </label>
                                <p v-if="category.description" class="text-gray-900">
                                    {{ category.description }}
                                </p>
                                <p v-else class="text-gray-400 italic">
                                    Sin descripción
                                </p>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
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
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Orden
                                    </label>
                                    <p class="text-gray-900">{{ category.sort_order }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">
                                Estadísticas
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-blue-600">
                                    {{ category.blog_posts_count || 0 }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    Posts asociados
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">
                                Acciones Rápidas
                            </h3>
                        </div>
                        <div class="p-6 space-y-3">
                            <Link
                                :href="route('admin.posts.create', { category: category.id })"
                                class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700"
                            >
                                Crear Post en esta Categoría
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<style scoped>
</style> 