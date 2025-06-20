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
                            :class="{ 'border-red-300': errors.name }"
                            placeholder="Ej: Desarrollo Web"
                        />
                        <div
                            v-if="errors.name"
                            class="mt-1 text-sm text-red-600"
                        >
                            {{ errors.name }}
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
                        <input
                            id="slug"
                            v-model="form.slug"
                            type="text"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            :class="{ 'border-red-300': errors.slug }"
                            placeholder="Se genera automáticamente si se deja vacío"
                        />
                        <div
                            v-if="errors.slug"
                            class="mt-1 text-sm text-red-600"
                        >
                            {{ errors.slug }}
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                            URL amigable para la categoría. Se genera
                            automáticamente si se deja vacío.
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
                            :class="{ 'border-red-300': errors.description }"
                            placeholder="Descripción breve de la categoría..."
                        ></textarea>
                        <div
                            v-if="errors.description"
                            class="mt-1 text-sm text-red-600"
                        >
                            {{ errors.description }}
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
                                :class="{ 'border-red-300': errors.color }"
                                placeholder="#3B82F6"
                            />
                        </div>
                        <div
                            v-if="errors.color"
                            class="mt-1 text-sm text-red-600"
                        >
                            {{ errors.color }}
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                            Color que se usará para identificar la categoría en
                            el sitio.
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
                            :class="{ 'border-red-300': errors.sort_order }"
                            placeholder="0"
                        />
                        <div
                            v-if="errors.sort_order"
                            class="mt-1 text-sm text-red-600"
                        >
                            {{ errors.sort_order }}
                        </div>
                        <p class="mt-1 text-sm text-gray-500">
                            Orden de aparición de la categoría. Menor número =
                            mayor prioridad.
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
                            Las categorías inactivas no se mostrarán en el sitio
                            público.
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
                            :disabled="processing"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                        >
                            <svg
                                v-if="processing"
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
                            {{ processing ? "Creando..." : "Crear Categoría" }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import { reactive, ref } from "vue";
import { Link, router } from "@inertiajs/vue3";
import AdminLayout from "../Layout.vue";
import { route } from '../../../utils/route.js'

const processing = ref(false);
const errors = ref({});

const form = reactive({
    name: "",
    slug: "",
    description: "",
    color: "#3B82F6",
    sort_order: 0,
    active: true,
});

const submit = () => {
    processing.value = true;
    errors.value = {};

    router.post(route("admin.categories.store"), form, {
        onSuccess: () => {
            // Redirigir se maneja en el controlador
        },
        onError: (responseErrors) => {
            errors.value = responseErrors;
        },
        onFinish: () => {
            processing.value = false;
        },
    });
};
</script>
