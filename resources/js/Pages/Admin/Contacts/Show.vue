<script setup>
import { computed } from "vue";
import { Link, router } from "@inertiajs/vue3";
import AdminLayout from "../Layout.vue";
import { route } from '../../../utils/route.js'

const props = defineProps({
    contact: {
        type: Object,
        required: true
    }
});

const statusClass = computed(() => {
    const statusClasses = {
        'new': 'bg-red-100 text-red-800',
        'read': 'bg-yellow-100 text-yellow-800',
        'replied': 'bg-green-100 text-green-800',
        'archived': 'bg-gray-100 text-gray-800'
    };
    return statusClasses[props.contact.status] || 'bg-gray-100 text-gray-800';
});

const statusText = computed(() => {
    const statusTexts = {
        'new': 'Nuevo',
        'read': 'Leído',
        'replied': 'Respondido',
        'archived': 'Archivado'
    };
    return statusTexts[props.contact.status] || 'Desconocido';
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

const markAsRead = () => {
    router.post(route("admin.contacts.mark-read", props.contact.id), {}, {
        preserveScroll: true,
        onError: (errors) => {
            console.error('❌ Error al marcar como leído:', errors);
            alert('Error al marcar el contacto como leído');
        }
    });
};

const markAsReplied = () => {
    router.post(route("admin.contacts.mark-replied", props.contact.id), {}, {
        preserveScroll: true,
        onError: (errors) => {
            console.error('❌ Error al marcar como respondido:', errors);
            alert('Error al marcar el contacto como respondido');
        }
    });
};

const archiveContact = () => {
    router.post(route("admin.contacts.archive", props.contact.id), {}, {
        preserveScroll: true,
        onError: (errors) => {
            console.error('❌ Error al archivar:', errors);
            alert('Error al archivar el contacto');
        }
    });
};

const deleteContact = () => {
    if (confirm(`¿Estás seguro de que quieres eliminar el contacto de "${props.contact.name}"?`)) {
        router.delete(route("admin.contacts.destroy", props.contact.id), {
            onSuccess: () => {
                // Redirigir al índice después de eliminar
                router.visit(route("admin.contacts.index"));
            },
            onError: (errors) => {
                console.error('❌ Error al eliminar:', errors);
                alert('Error al eliminar el contacto');
            }
        });
    }
};
</script>

<template>
    <AdminLayout page-title="Detalle del Contacto">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="bg-white rounded-lg shadow mb-6">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <Link 
                                :href="route('admin.contacts.index')"
                                class="text-gray-500 hover:text-gray-700"
                            >
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </Link>
                            <div>
                                <h1 class="text-2xl font-semibold text-gray-900">
                                    {{ contact.name }}
                                </h1>
                                <p class="text-sm text-gray-600">
                                    Contacto recibido el {{ formatDate(contact.created_at) }}
                                </p>
                            </div>
                        </div>
                        <span :class="['inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium', statusClass]">
                            {{ statusText }}
                        </span>
                    </div>
                </div>

                <!-- Acciones -->
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <div class="flex flex-wrap gap-2">
                        <button
                            v-if="contact.status === 'new'"
                            @click="markAsRead"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500"
                        >
                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Marcar como Leído
                        </button>

                        <button
                            v-if="contact.status !== 'replied'"
                            @click="markAsReplied"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                        >
                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Marcar como Respondido
                        </button>

                        <button
                            v-if="contact.status !== 'archived'"
                            @click="archiveContact"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500"
                        >
                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8a2 2 0 100-4 2 2 0 000 4zm0 0v4a2 2 0 002 2h6a2 2 0 002-2v-4"/>
                            </svg>
                            Archivar
                        </button>

                        <a
                            :href="`mailto:${contact.email}?subject=Re: ${contact.subject}`"
                            class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Responder por Email
                        </a>

                        <button
                            @click="deleteContact"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                        >
                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Eliminar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Información del Contacto -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Información Principal -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-medium text-gray-900">Mensaje</h2>
                        </div>
                        <div class="px-6 py-4">
                            <div class="mb-4">
                                <h3 class="text-sm font-medium text-gray-500 mb-1">Asunto</h3>
                                <p class="text-sm text-gray-900">{{ contact.subject }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 mb-2">Mensaje</h3>
                                <div class="prose max-w-none">
                                    <p class="text-sm text-gray-900 whitespace-pre-wrap">{{ contact.message }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información de Contacto -->
                <div class="space-y-6">
                    <!-- Datos Personales -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-medium text-gray-900">Datos de Contacto</h2>
                        </div>
                        <div class="px-6 py-4 space-y-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Nombre</h3>
                                <p class="text-sm text-gray-900">{{ contact.name }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Email</h3>
                                <p class="text-sm text-gray-900">
                                    <a :href="`mailto:${contact.email}`" class="text-blue-600 hover:text-blue-800">
                                        {{ contact.email }}
                                    </a>
                                </p>
                            </div>
                            <div v-if="contact.phone">
                                <h3 class="text-sm font-medium text-gray-500">Teléfono</h3>
                                <p class="text-sm text-gray-900">
                                    <a :href="`tel:${contact.phone}`" class="text-blue-600 hover:text-blue-800">
                                        {{ contact.phone }}
                                    </a>
                                </p>
                            </div>
                            <div v-if="contact.company">
                                <h3 class="text-sm font-medium text-gray-500">Empresa</h3>
                                <p class="text-sm text-gray-900">{{ contact.company }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Información del Sistema -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-medium text-gray-900">Información del Sistema</h2>
                        </div>
                        <div class="px-6 py-4 space-y-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Estado</h3>
                                <span :class="['inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium', statusClass]">
                                    {{ statusText }}
                                </span>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Fecha de Contacto</h3>
                                <p class="text-sm text-gray-900">{{ formatDate(contact.created_at) }}</p>
                            </div>
                            <div v-if="contact.read_at">
                                <h3 class="text-sm font-medium text-gray-500">Leído el</h3>
                                <p class="text-sm text-gray-900">{{ formatDate(contact.read_at) }}</p>
                            </div>
                            <div v-if="contact.replied_at">
                                <h3 class="text-sm font-medium text-gray-500">Respondido el</h3>
                                <p class="text-sm text-gray-900">{{ formatDate(contact.replied_at) }}</p>
                            </div>
                            <div v-if="contact.ip_address">
                                <h3 class="text-sm font-medium text-gray-500">Dirección IP</h3>
                                <p class="text-sm text-gray-900 font-mono">{{ contact.ip_address }}</p>
                            </div>
                            <div v-if="contact.user_agent">
                                <h3 class="text-sm font-medium text-gray-500">Navegador</h3>
                                <p class="text-xs text-gray-900 break-all">{{ contact.user_agent }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<style scoped>
.prose p {
    margin-bottom: 1rem;
}
</style> 