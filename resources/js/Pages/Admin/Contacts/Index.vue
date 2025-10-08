<template>
    <AdminLayout page-title="Gestión de Contactos">
        <!-- Header con estadísticas -->
        <div class="mb-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">
                        Contactos
                    </h1>
                    <p class="mt-1 text-sm text-gray-600">
                        Gestiona todos los mensajes de contacto
                    </p>
                </div>
            </div>

            <!-- Estadísticas rápidas -->
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="p-2 rounded-full bg-blue-100">
                            <svg
                                class="h-5 w-5 text-blue-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-600">
                                Total
                            </p>
                            <p class="text-lg font-semibold text-gray-900">
                                {{ stats.total }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="p-2 rounded-full bg-red-100">
                            <svg
                                class="h-5 w-5 text-red-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"
                                />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-600">
                                Nuevos
                            </p>
                            <p class="text-lg font-semibold text-gray-900">
                                {{ stats.new }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="p-2 rounded-full bg-yellow-100">
                            <svg
                                class="h-5 w-5 text-yellow-600"
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
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-600">
                                Leídos
                            </p>
                            <p class="text-lg font-semibold text-gray-900">
                                {{ stats.read }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="p-2 rounded-full bg-green-100">
                            <svg
                                class="h-5 w-5 text-green-600"
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
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-600">
                                Respondidos
                            </p>
                            <p class="text-lg font-semibold text-gray-900">
                                {{ stats.replied }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center">
                        <div class="p-2 rounded-full bg-purple-100">
                            <svg
                                class="h-5 w-5 text-purple-600"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 7V3a4 4 0 118 0v4m-4 8a2 2 0 100-4 2 2 0 000 4zm0 0v4a2 2 0 002 2h6a2 2 0 002-2v-4"
                                />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-600">
                                Este Mes
                            </p>
                            <p class="text-lg font-semibold text-gray-900">
                                {{ stats.this_month }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
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
                            placeholder="Nombre, email, asunto..."
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
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                            <option value="">Todos</option>
                            <option value="new">Nuevos</option>
                            <option value="read">Leídos</option>
                            <option value="replied">Respondidos</option>
                            <option value="archived">Archivados</option>
                        </select>
                    </div>

                    <!-- Fecha desde -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Desde</label
                        >
                        <input
                            v-model="filters.date_from"
                            type="date"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        />
                    </div>

                    <!-- Fecha hasta -->
                    <div>
                        <label
                            class="block text-sm font-medium text-gray-700 mb-1"
                            >Hasta</label
                        >
                        <input
                            v-model="filters.date_to"
                            type="date"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        />
                    </div>

                    <!-- Botones -->
                    <div class="md:col-span-4 flex items-center space-x-3">
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

        <!-- Acciones en lote -->
        <div
            v-if="selectedContacts.length > 0"
            class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6"
        >
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <span class="text-sm font-medium text-blue-900">
                        {{ selectedContacts.length }} contacto(s)
                        seleccionado(s)
                    </span>
                </div>
                <div class="flex items-center space-x-2">
                    <button
                        @click="bulkAction('mark_read')"
                        class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded text-blue-700 bg-blue-100 hover:bg-blue-200"
                    >
                        Marcar como leído
                    </button>
                    <button
                        @click="bulkAction('mark_replied')"
                        class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded text-green-700 bg-green-100 hover:bg-green-200"
                    >
                        Marcar como respondido
                    </button>
                    <button
                        @click="bulkAction('archive')"
                        class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded text-gray-700 bg-gray-100 hover:bg-gray-200"
                    >
                        Archivar
                    </button>
                    <button
                        @click="bulkAction('delete')"
                        class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded text-red-700 bg-red-100 hover:bg-red-200"
                    >
                        Eliminar
                    </button>
                </div>
            </div>
        </div>

        <!-- Tabla de contactos -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left">
                                <input
                                    type="checkbox"
                                    @change="toggleSelectAll"
                                    :checked="allSelected"
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                />
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Contacto
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Asunto
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                            >
                                Estado
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
                            v-for="contact in contacts.data"
                            :key="contact.id"
                            :class="{ 'bg-blue-50': contact.status === 'new' }"
                            class="hover:bg-gray-50"
                        >
                            <td class="px-6 py-4">
                                <input
                                    type="checkbox"
                                    :value="contact.id"
                                    v-model="selectedContacts"
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                />
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div
                                            class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center"
                                        >
                                            <span
                                                class="text-sm font-medium text-gray-700"
                                            >
                                                {{
                                                    contact.name
                                                        .charAt(0)
                                                        .toUpperCase()
                                                }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div
                                            class="text-sm font-medium text-gray-900"
                                        >
                                            {{ contact.name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ contact.email }}
                                        </div>
                                        <div
                                            v-if="contact.company"
                                            class="text-xs text-gray-400"
                                        >
                                            {{ contact.company }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{ contact.subject }}
                                </div>
                                <div
                                    class="text-sm text-gray-500 truncate max-w-xs"
                                >
                                    {{ contact.message }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                    :class="contact.status_class"
                                >
                                    {{ contact.status_text }}
                                </span>
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                            >
                                {{ formatDate(contact.created_at) }}
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
                                            route(
                                                'admin.contacts.show',
                                                contact.id
                                            )
                                        "
                                        class="text-blue-600 hover:text-blue-900"
                                        title="Ver contacto"
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

                                    <!-- Marcar como leído -->
                                    <button
                                        v-if="contact.status === 'new'"
                                        @click="markAsRead(contact)"
                                        class="text-yellow-600 hover:text-yellow-900"
                                        title="Marcar como leído"
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
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                            />
                                        </svg>
                                    </button>

                                    <!-- Marcar como respondido -->
                                    <button
                                        v-if="contact.status !== 'replied'"
                                        @click="markAsReplied(contact)"
                                        class="text-green-600 hover:text-green-900"
                                        title="Marcar como respondido"
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

                                    <!-- Archivar -->
                                    <button
                                        v-if="contact.status !== 'archived'"
                                        @click="archiveContact(contact)"
                                        class="text-gray-600 hover:text-gray-900"
                                        title="Archivar"
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
                                                d="M5 8l6 6m0 0l6-6m-6 6V3"
                                            />
                                        </svg>
                                    </button>

                                    <!-- Eliminar -->
                                    <button
                                        @click="deleteContact(contact)"
                                        class="text-red-600 hover:text-red-900"
                                        title="Eliminar contacto"
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
                v-if="contacts.links"
                class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6"
            >
                <div class="flex items-center justify-between">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <Link
                            v-if="contacts.prev_page_url"
                            :href="contacts.prev_page_url"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                        >
                            Anterior
                        </Link>
                        <Link
                            v-if="contacts.next_page_url"
                            :href="contacts.next_page_url"
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
                                    contacts.from
                                }}</span>
                                a
                                <span class="font-medium">{{
                                    contacts.to
                                }}</span>
                                de
                                <span class="font-medium">{{
                                    contacts.total
                                }}</span>
                                resultados
                            </p>
                        </div>
                        <div>
                            <nav
                                class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                            >
                                <template
                                    v-for="(link, index) in contacts.links"
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
                                            index === contacts.links.length - 1
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
                                            index === contacts.links.length - 1
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
import { ref, reactive, computed } from "vue";
import { Link, router } from "@inertiajs/vue3";
import AdminLayout from "../Layout.vue";
import { route } from '../../../utils/route.js'

const props = defineProps({
    contacts: Object,
    stats: Object,
    filters: Object,
});

const filters = reactive({
    search: props.filters.search || "",
    status: props.filters.status || "",
    date_from: props.filters.date_from || "",
    date_to: props.filters.date_to || "",
});

const selectedContacts = ref([]);

const allSelected = computed(() => {
    return (
        props.contacts.data.length > 0 &&
        selectedContacts.value.length === props.contacts.data.length
    );
});

const search = () => {
    router.get(route("admin.contacts.index"), filters, {
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

const toggleSelectAll = () => {
    if (allSelected.value) {
        selectedContacts.value = [];
    } else {
        selectedContacts.value = props.contacts.data.map(
            (contact) => contact.id
        );
    }
};

const markAsRead = (contact) => {
    router.post(
        route("admin.contacts.mark-read", contact.id),
        {},
        {
            preserveScroll: true,
            only: ['contacts', 'stats'],
            onError: (errors) => {
                console.error('❌ Error al marcar como leído:', errors);
                alert('Error al marcar el contacto como leído');
            }
        }
    );
};

const markAsReplied = (contact) => {
    router.post(
        route("admin.contacts.mark-replied", contact.id),
        {},
        {
            preserveScroll: true,
            only: ['contacts', 'stats'],
            onError: (errors) => {
                console.error('❌ Error al marcar como respondido:', errors);
                alert('Error al marcar el contacto como respondido');
            }
        }
    );
};

const archiveContact = (contact) => {
    router.post(
        route("admin.contacts.archive", contact.id),
        {},
        {
            preserveScroll: true,
            only: ['contacts', 'stats'],
            onError: (errors) => {
                console.error('❌ Error al archivar:', errors);
                alert('Error al archivar el contacto');
            }
        }
    );
};

const deleteContact = (contact) => {
    if (confirm(`¿Estás seguro de que quieres eliminar el contacto de "${contact.name}"?`)) {
        router.delete(route("admin.contacts.destroy", contact.id), {
            preserveScroll: true,
            only: ['contacts', 'stats'],
            onError: (errors) => {
                console.error('❌ Error al eliminar:', errors);
                alert('Error al eliminar el contacto');
            }
        });
    }
};

const bulkAction = (action) => {
    if (selectedContacts.value.length === 0) {
        alert("Selecciona al menos un contacto.");
        return;
    }

    let message = "";
    switch (action) {
        case "mark_read":
            message = "¿Marcar los contactos seleccionados como leídos?";
            break;
        case "mark_replied":
            message = "¿Marcar los contactos seleccionados como respondidos?";
            break;
        case "archive":
            message = "¿Archivar los contactos seleccionados?";
            break;
        case "delete":
            message =
                "¿Eliminar los contactos seleccionados? Esta acción no se puede deshacer.";
            break;
    }

    if (confirm(message)) {
        router.post(
            route("admin.contacts.bulk-action"),
            {
                action: action,
                contacts: selectedContacts.value,
            },
            {
                preserveScroll: true,
                only: ['contacts', 'stats'],
                onSuccess: () => {
                    selectedContacts.value = [];
                },
                onError: (errors) => {
                    console.error('❌ Error en acción masiva:', errors);
                    alert('Error al realizar la acción masiva');
                }
            }
        );
    }
};

const formatDate = (date) => {
    return new Date(date).toLocaleDateString("es-CL", {
        year: "numeric",
        month: "short",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit",
    });
};
</script>
