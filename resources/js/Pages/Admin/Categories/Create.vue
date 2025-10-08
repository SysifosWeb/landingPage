<script setup>
// Versión 2.1 - Cache busted - Sistema de categorías funcional - HASH:ABC123XYZ
import { ref, watch } from "vue";
import { Link, useForm } from "@inertiajs/vue3";
import AdminLayout from "../Layout.vue";
import { route } from '../../../utils/route.js'

const form = useForm({
    name: "",
    slug: "",
    description: "",
    color: "#3B82F6",
    sort_order: 0,
    active: true,
});

// Generar slug automáticamente cuando cambia el nombre
watch(() => form.name, (newName) => {
    if (newName && !form.slug) {
        form.slug = generateSlug(newName);
    }
});

// Función para generar slug
const generateSlug = (text) => {
    return text
        .toLowerCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/[^a-z0-9\s-]/g, "")
        .trim()
        .replace(/\s+/g, "-")
        .replace(/-+/g, "-");
};

// Validar color hexadecimal
const validateColor = (color) => {
    const hexRegex = /^#[0-9A-Fa-f]{6}$/;
    return hexRegex.test(color);
};

// Función para limpiar el slug manualmente
const generateSlugFromName = () => {
    if (form.name) {
        form.slug = generateSlug(form.name);
    }
};

// Función para enviar el formulario
const submit = () => {
    console.log('🚀 Iniciando envío del formulario...');
    console.log('📋 Datos del formulario:', form.data());
    console.log('🔗 URL de destino:', route("admin.categories.store"));
    
    // Validación del lado del cliente
    if (!validateColor(form.color)) {
        console.log('❌ Error de validación de color');
        form.setError('color', 'El color debe ser un código hexadecimal válido (ej: #3B82F6)');
        return;
    }

    console.log('✅ Validación pasada, enviando...');
    
    // Enviar formulario usando useForm de Inertia - URL HARDCODEADA PARA EVITAR CACHE
    form.post("/admin/categories", {
        preserveScroll: true,
        onStart: () => {
            console.log('⏳ Iniciando petición...');
        },
        onProgress: (progress) => {
            console.log('📊 Progreso:', progress);
        },
        onSuccess: (response) => {
            console.log('🎉 ¡Categoría creada exitosamente!');
            console.log('📄 Respuesta:', response);
        },
        onError: (errors) => {
            console.error('💥 Error al crear categoría:', errors);
        },
        onFinish: () => {
            console.log('🏁 Petición finalizada');
        }
    });
};
</script>

<template>
    <AdminLayout page-title="Nueva Categoría">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <div class="mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">
                            Nueva Categoría
                        </h1>
                        <p class="mt-1 text-sm text-gray-600">
                            Crea una nueva categoría para organizar tus posts
                        </p>
                    </div>
                    <Link
                        :href="route('admin.categories.index')"
                        class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150"
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
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"
                            />
                        </svg>
                        Volver
                    </Link>
                </div>
            </div>

            <!-- Formulario -->
            <div class="bg-white rounded-lg shadow">
                <form @submit.prevent="submit" class="p-6 space-y-6">
                    <!-- Nombre -->
                    <div>
                        <label
                            for="name"
                            class="block text-sm font-medium text-gray-700 mb-1"
                        >
                            Nombre <span class="text-red-500">*</span>
                        </label>
                        <input
                            id="name"
                            v-model="form.name"
                            type="text"
                            required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            :class="{ 'border-red-300': form.errors.name }"
                            placeholder="Ej: Desarrollo Web"
                        />
                        <div
                            v-if="form.errors.name"
                            class="mt-1 text-sm text-red-600"
                        >
                            {{ form.errors.name }}
                        </div>
                        <div
                            v-if="form.errors.error"
                            class="mt-1 text-sm text-red-600"
                        >
                            {{ form.errors.error }}
                        </div>
                    </div>

                    <!-- Slug -->
                    <div>
                        <label
                            for="slug"
                            class="block text-sm font-medium text-gray-700 mb-1"
                        >
                            Slug
                        </label>
                        <div class="flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                /blog/categoria/
                            </span>
                            <input
                                id="slug"
                                v-model="form.slug"
                                type="text"
                                class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                :class="{ 'border-red-300': form.errors.slug }"
                                placeholder="se-genera-automaticamente"
                            />
                            <button
                                @click="generateSlugFromName"
                                type="button"
                                class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                title="Generar desde el nombre"
                            >
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                            </button>
                        </div>
                        <div
                            v-if="form.errors.slug"
                            class="mt-1 text-sm text-red-600"
                        >
                            {{ form.errors.slug }}
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                            URL amigable para la categoría. Se genera automáticamente si se deja vacío.
                        </p>
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label
                            for="description"
                            class="block text-sm font-medium text-gray-700 mb-1"
                        >
                            Descripción
                        </label>
                        <textarea
                            id="description"
                            v-model="form.description"
                            rows="3"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            :class="{ 'border-red-300': form.errors.description }"
                            placeholder="Descripción breve de la categoría..."
                        ></textarea>
                        <div
                            v-if="form.errors.description"
                            class="mt-1 text-sm text-red-600"
                        >
                            {{ form.errors.description }}
                        </div>
                    </div>

                    <!-- Color -->
                    <div>
                        <label
                            for="color"
                            class="block text-sm font-medium text-gray-700 mb-1"
                        >
                            Color
                        </label>
                        <div class="flex items-center space-x-3">
                            <input
                                id="color"
                                v-model="form.color"
                                type="color"
                                class="h-10 w-20 rounded border border-gray-300 cursor-pointer"
                            />
                            <input
                                v-model="form.color"
                                type="text"
                                class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                :class="{ 'border-red-300': form.errors.color }"
                                placeholder="#3B82F6"
                                maxlength="7"
                            />
                            <!-- Preview del color -->
                            <div class="flex items-center space-x-2">
                                <div 
                                    class="w-6 h-6 rounded border border-gray-300"
                                    :style="{ backgroundColor: form.color }"
                                ></div>
                                <span 
                                    v-if="validateColor(form.color)"
                                    class="text-xs text-green-600"
                                >
                                    ✓ Válido
                                </span>
                                <span 
                                    v-else-if="form.color"
                                    class="text-xs text-red-600"
                                >
                                    ✗ Inválido
                                </span>
                            </div>
                        </div>
                        <div
                            v-if="form.errors.color"
                            class="mt-1 text-sm text-red-600"
                        >
                            {{ form.errors.color }}
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                            Color que se usará para identificar la categoría en el sitio.
                        </p>
                    </div>

                    <!-- Orden -->
                    <div>
                        <label
                            for="sort_order"
                            class="block text-sm font-medium text-gray-700 mb-1"
                        >
                            Orden
                        </label>
                        <input
                            id="sort_order"
                            v-model.number="form.sort_order"
                            type="number"
                            min="0"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            :class="{ 'border-red-300': form.errors.sort_order }"
                            placeholder="0"
                        />
                        <div
                            v-if="form.errors.sort_order"
                            class="mt-1 text-sm text-red-600"
                        >
                            {{ form.errors.sort_order }}
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                            Orden de aparición de la categoría. Menor número = mayor prioridad.
                        </p>
                    </div>

                    <!-- Estado -->
                    <div>
                        <div class="flex items-center">
                            <input
                                id="active"
                                v-model="form.active"
                                type="checkbox"
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            />
                            <label
                                for="active"
                                class="ml-2 block text-sm text-gray-900"
                            >
                                Categoría activa
                            </label>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                            Las categorías inactivas no se mostrarán en el sitio público.
                        </p>
                    </div>

                    <!-- Botones -->
                    <div
                        class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200"
                    >
                        <Link
                            :href="route('admin.categories.index')"
                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                        >
                            Cancelar
                        </Link>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                        >
                            <svg
                                v-if="form.processing"
                                class="animate-spin -ml-1 mr-2 h-4 w-4 text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <circle
                                    class="opacity-25"
                                    cx="12"
                                    cy="12"
                                    r="10"
                                    stroke="currentColor"
                                    stroke-width="4"
                                ></circle>
                                <path
                                    class="opacity-75"
                                    fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                ></path>
                            </svg>
                            {{ form.processing ? "Creando..." : "Crear Categoría" }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>

<style scoped>
/* Estilos específicos si son necesarios */
</style>
