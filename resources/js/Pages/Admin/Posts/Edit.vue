<script setup>
import { reactive, computed, watch } from "vue";
import { router, useForm, Link } from "@inertiajs/vue3";
import AdminLayout from "../Layout.vue";
import { route } from '../../../utils/route.js'

const props = defineProps({
    post: {
        type: Object,
        required: true
    },
    categories: {
        type: Array,
        default: () => []
    }
});

const form = useForm({
    title: props.post.title || '',
    slug: props.post.slug || '',
    excerpt: props.post.excerpt || '',
    content: props.post.content || '',
    category_id: props.post.category_id || '',
    featured_image_url: props.post.featured_image_url || '',
    meta_title: props.post.meta_title || '',
    meta_description: props.post.meta_description || '',
    meta_keywords: Array.isArray(props.post.meta_keywords) 
        ? props.post.meta_keywords.join(', ') 
        : (props.post.meta_keywords || ''),
    status: props.post.status || 'draft',
    featured: props.post.featured || false,
    published_at: props.post.published_at || null
});

const generateSlug = (title) => {
    return title
        .toLowerCase()
        .replace(/[áàäâ]/g, 'a')
        .replace(/[éèëê]/g, 'e')
        .replace(/[íìïî]/g, 'i')
        .replace(/[óòöô]/g, 'o')
        .replace(/[úùüû]/g, 'u')
        .replace(/[ñ]/g, 'n')
        .replace(/[ç]/g, 'c')
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .trim('-');
};

watch(() => form.title, (newTitle) => {
    if (newTitle && !form.slug) {
        form.slug = generateSlug(newTitle);
    }
});



const submit = () => {
    form.put(route('admin.posts.update', props.post.id), {
        onSuccess: () => {
            console.log('✅ Post actualizado exitosamente');
        },
        onError: (errors) => {
            console.error('❌ Error al actualizar post:', errors);
        }
    });
};

const statusOptions = [
    { value: 'draft', label: 'Borrador' },
    { value: 'published', label: 'Publicado' }
];

const isPublished = computed(() => form.status === 'published');
</script>

<template>
    <AdminLayout page-title="Editar Post">
        <div class="max-w-4xl mx-auto">
            <div class="mb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-900">
                            Editar Post
                        </h1>
                        <p class="mt-1 text-sm text-gray-600">
                            Modifica la información del post
                        </p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <Link
                            :href="route('admin.posts.show', post.id)"
                            class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700"
                        >
                            Ver Post
                        </Link>
                        <Link
                            :href="route('admin.posts.index')"
                            class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700"
                        >
                            Cancelar
                        </Link>
                    </div>
                </div>
            </div>

            <form @submit.prevent="submit" class="space-y-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Información básica -->
                        <div class="bg-white rounded-lg shadow">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900">
                                    Información Principal
                                </h3>
                            </div>
                            <div class="p-6 space-y-6">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                                        Título *
                                    </label>
                                    <input
                                        id="title"
                                        v-model="form.title"
                                        type="text"
                                        required
                                        class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        placeholder="Título del post"
                                    />
                                    <div v-if="form.errors.title" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.title }}
                                    </div>
                                </div>

                                <div>
                                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">
                                        Slug *
                                    </label>
                                    <input
                                        id="slug"
                                        v-model="form.slug"
                                        type="text"
                                        required
                                        class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        placeholder="slug-del-post"
                                    />
                                    <p class="mt-1 text-sm text-gray-500">
                                        URL: /blog/{{ form.slug }}
                                    </p>
                                    <div v-if="form.errors.slug" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.slug }}
                                    </div>
                                </div>

                                <div>
                                    <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-1">
                                        Extracto
                                    </label>
                                    <textarea
                                        id="excerpt"
                                        v-model="form.excerpt"
                                        rows="3"
                                        class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        placeholder="Breve descripción del post..."
                                    ></textarea>
                                    <div v-if="form.errors.excerpt" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.excerpt }}
                                    </div>
                                </div>

                                <div>
                                    <label for="content" class="block text-sm font-medium text-gray-700 mb-1">
                                        Contenido *
                                    </label>
                                    <textarea
                                        id="content"
                                        v-model="form.content"
                                        rows="12"
                                        required
                                        class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        placeholder="Escribe el contenido del post aquí..."
                                    ></textarea>
                                    <div v-if="form.errors.content" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.content }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SEO -->
                        <div class="bg-white rounded-lg shadow">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900">
                                    Optimización SEO
                                </h3>
                            </div>
                            <div class="p-6 space-y-6">
                                <div>
                                    <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-1">
                                        Meta Título
                                    </label>
                                    <input
                                        id="meta_title"
                                        v-model="form.meta_title"
                                        type="text"
                                        class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        placeholder="Título para SEO (opcional)"
                                    />
                                    <div v-if="form.errors.meta_title" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.meta_title }}
                                    </div>
                                </div>

                                <div>
                                    <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-1">
                                        Meta Descripción
                                    </label>
                                    <textarea
                                        id="meta_description"
                                        v-model="form.meta_description"
                                        rows="3"
                                        class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        placeholder="Descripción para motores de búsqueda..."
                                    ></textarea>
                                    <div v-if="form.errors.meta_description" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.meta_description }}
                                    </div>
                                </div>

                                <div>
                                    <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-1">
                                        Palabras Clave
                                    </label>
                                    <input
                                        id="meta_keywords"
                                        v-model="form.meta_keywords"
                                        type="text"
                                        class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        placeholder="palabra1, palabra2, palabra3"
                                    />
                                    <p class="mt-1 text-sm text-gray-500">
                                        Separa las palabras con comas
                                    </p>
                                    <div v-if="form.errors.meta_keywords" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.meta_keywords }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <!-- Configuración -->
                        <div class="bg-white rounded-lg shadow">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900">
                                    Configuración
                                </h3>
                            </div>
                            <div class="p-6 space-y-6">
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                                        Estado
                                    </label>
                                    <select
                                        id="status"
                                        v-model="form.status"
                                        class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    >
                                        <option
                                            v-for="option in statusOptions"
                                            :key="option.value"
                                            :value="option.value"
                                        >
                                            {{ option.label }}
                                        </option>
                                    </select>
                                    <div v-if="form.errors.status" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.status }}
                                    </div>
                                </div>

                                <div>
                                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">
                                        Categoría
                                    </label>
                                    <select
                                        id="category_id"
                                        v-model="form.category_id"
                                        class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    >
                                        <option value="">Sin categoría</option>
                                        <option
                                            v-for="category in categories"
                                            :key="category.id"
                                            :value="category.id"
                                        >
                                            {{ category.name }}
                                        </option>
                                    </select>
                                    <div v-if="form.errors.category_id" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.category_id }}
                                    </div>
                                </div>

                                <div>
                                    <label for="featured_image_url" class="block text-sm font-medium text-gray-700 mb-1">
                                        Imagen Destacada (URL)
                                    </label>
                                    <input
                                        id="featured_image_url"
                                        v-model="form.featured_image_url"
                                        type="url"
                                        class="w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        placeholder="https://ejemplo.com/imagen.jpg"
                                    />
                                    <div v-if="form.errors.featured_image_url" class="mt-1 text-sm text-red-600">
                                        {{ form.errors.featured_image_url }}
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <input
                                        id="featured"
                                        v-model="form.featured"
                                        type="checkbox"
                                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                    />
                                    <label for="featured" class="ml-2 block text-sm text-gray-900">
                                        Post destacado
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Vista previa de imagen -->
                        <div v-if="form.featured_image_url" class="bg-white rounded-lg shadow">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900">
                                    Vista Previa
                                </h3>
                            </div>
                            <div class="p-6">
                                <img
                                    :src="form.featured_image_url"
                                    :alt="form.title"
                                    class="w-full h-32 object-cover rounded-lg"
                                    @error="form.featured_image_url = ''"
                                />
                            </div>
                        </div>

                        <!-- Acciones -->
                        <div class="bg-white rounded-lg shadow">
                            <div class="p-6">
                                <button
                                    type="submit"
                                    :disabled="form.processing"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed"
                                >
                                    <span v-if="form.processing">Actualizando...</span>
                                    <span v-else>Actualizar Post</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>

<style scoped>
/* Estilos específicos para el formulario */
.form-input:focus {
    ring-color: #6366f1;
    border-color: #6366f1;
}

textarea {
    resize: vertical;
}

.keyword-tag {
    transition: all 0.2s ease;
}

.keyword-tag:hover {
    transform: translateY(-1px);
}
</style> 