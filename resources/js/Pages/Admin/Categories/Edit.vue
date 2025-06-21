<script setup>
import { ref, watch } from "vue";
import { Link, useForm } from "@inertiajs/vue3";
import AdminLayout from "../Layout.vue";
import { route } from '../../../utils/route.js'

const props = defineProps({
    category: {
        type: Object,
        required: true
    }
});

const form = useForm({
    name: props.category.name,
    slug: props.category.slug,
    description: props.category.description || "",
    color: props.category.color || "#3B82F6",
    sort_order: props.category.sort_order || 0,
    active: props.category.active,
});

const originalSlug = ref(props.category.slug);
const slugModifiedManually = ref(false);

watch(() => form.name, (newName) => {
    if (newName && !slugModifiedManually.value) {
        form.slug = generateSlug(newName);
    }
});

watch(() => form.slug, (newSlug) => {
    if (newSlug !== generateSlug(form.name) && newSlug !== originalSlug.value) {
        slugModifiedManually.value = true;
    }
});

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

const validateColor = (color) => {
    const hexRegex = /^#[0-9A-Fa-f]{6}$/;
    return hexRegex.test(color);
};

const generateSlugFromName = () => {
    if (form.name) {
        form.slug = generateSlug(form.name);
        slugModifiedManually.value = false;
    }
};

const submit = () => {
    console.log('🔄 Actualizando categoría...');
    console.log('📋 Datos del formulario:', form.data());
    console.log('🎯 Ruta de actualización:', route("admin.categories.update", props.category.id));
    
    if (!validateColor(form.color)) {
        console.log('❌ Error de validación de color');
        form.setError('color', 'El color debe ser un código hexadecimal válido (ej: #3B82F6)');
        return;
    }

    console.log('✅ Validación pasada, actualizando...');
    
    form.put(route("admin.categories.update", props.category.id), {
        preserveScroll: true,
        onStart: () => {
            console.log('⏳ Iniciando actualización...');
        },
        onSuccess: (response) => {
            console.log('🎉 ¡Categoría actualizada exitosamente!');
            console.log('📄 Respuesta:', response);
        },
        onError: (errors) => {
            console.error('💥 Error al actualizar categoría:', errors);
        },
        onFinish: () => {
            console.log('🏁 Actualización finalizada');
        }
    });
};
</script>

<template>
    <AdminLayout :page-title="`Editar: ${category.name}`">
        <div class="max-w-2xl mx-auto">
            <div class="mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">
                            Editar Categoría
                        </h1>
                        <p class="mt-1 text-sm text-gray-600">
                            Modifica los datos de la categoría "{{ category.name }}"
                        </p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <Link
                            :href="route('admin.categories.show', category.id)"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700"
                        >
                            Ver
                        </Link>
                        <Link
                            :href="route('admin.categories.index')"
                            class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700"
                        >
                            Volver
                        </Link>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow">
                <form @submit.prevent="submit" class="p-6 space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
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
                        <div v-if="form.errors.name" class="mt-1 text-sm text-red-600">
                            {{ form.errors.name }}
                        </div>
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">
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
                                class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 hover:bg-gray-100"
                                title="Generar desde el nombre"
                            >
                                ↻
                            </button>
                        </div>
                        <div v-if="form.errors.slug" class="mt-1 text-sm text-red-600">
                            {{ form.errors.slug }}
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
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
                        <div v-if="form.errors.description" class="mt-1 text-sm text-red-600">
                            {{ form.errors.description }}
                        </div>
                    </div>

                    <div>
                        <label for="color" class="block text-sm font-medium text-gray-700 mb-1">
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
                        <div v-if="form.errors.color" class="mt-1 text-sm text-red-600">
                            {{ form.errors.color }}
                        </div>
                    </div>

                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">
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
                        <div v-if="form.errors.sort_order" class="mt-1 text-sm text-red-600">
                            {{ form.errors.sort_order }}
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center">
                            <input
                                id="active"
                                v-model="form.active"
                                type="checkbox"
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            />
                            <label for="active" class="ml-2 block text-sm text-gray-900">
                                Categoría activa
                            </label>
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                        <Link
                            :href="route('admin.categories.show', category.id)"
                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50"
                        >
                            Cancelar
                        </Link>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 disabled:opacity-25"
                        >
                            {{ form.processing ? "Actualizando..." : "Actualizar Categoría" }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>

<style scoped>
</style> 