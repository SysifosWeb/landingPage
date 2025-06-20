<template>
    <div class="min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <div
            class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out"
            :class="
                sidebarOpen
                    ? 'translate-x-0'
                    : '-translate-x-full lg:translate-x-0'
            "
        >
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 px-4 bg-blue-600">
                <div class="text-white font-bold text-lg">SysifosWeb Admin</div>
            </div>

            <!-- Navigation -->
            <nav class="mt-8">
                <div class="px-4 space-y-2">
                    <!-- Dashboard -->
                    <Link
                        :href="route('admin.dashboard')"
                        class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors"
                        :class="
                            routeCurrent('admin.dashboard')
                                ? 'bg-blue-100 text-blue-700'
                                : 'text-gray-600 hover:bg-gray-100'
                        "
                    >
                        <svg
                            class="mr-3 h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"
                            />
                        </svg>
                        Dashboard
                    </Link>

                    <!-- Posts -->
                    <Link
                        :href="route('admin.posts.index')"
                        class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors"
                        :class="
                            routeCurrent('admin.posts.*')
                                ? 'bg-blue-100 text-blue-700'
                                : 'text-gray-600 hover:bg-gray-100'
                        "
                    >
                        <svg
                            class="mr-3 h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                            />
                        </svg>
                        Posts del Blog
                    </Link>

                    <!-- Categorías -->
                    <Link
                        :href="route('admin.categories.index')"
                        class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors"
                        :class="
                            routeCurrent('admin.categories.*')
                                ? 'bg-blue-100 text-blue-700'
                                : 'text-gray-600 hover:bg-gray-100'
                        "
                    >
                        <svg
                            class="mr-3 h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"
                            />
                        </svg>
                        Categorías
                    </Link>

                    <!-- Contactos -->
                    <Link
                        :href="route('admin.contacts.index')"
                        class="flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors"
                        :class="
                            routeCurrent('admin.contacts.*')
                                ? 'bg-blue-100 text-blue-700'
                                : 'text-gray-600 hover:bg-gray-100'
                        "
                    >
                        <svg
                            class="mr-3 h-5 w-5"
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
                        Contactos
                        <span
                            v-if="newContactsCount > 0"
                            class="ml-auto bg-red-500 text-white text-xs rounded-full px-2 py-1"
                        >
                            {{ newContactsCount }}
                        </span>
                    </Link>
                </div>

                <!-- Separador -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <div class="px-4 space-y-2">
                        <!-- Ver sitio -->
                        <a
                            :href="route('home')"
                            target="_blank"
                            class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-100 transition-colors"
                        >
                            <svg
                                class="mr-3 h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                                />
                            </svg>
                            Ver Sitio Web
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Main content -->
        <div class="lg:pl-64">
            <!-- Top bar -->
            <div
                class="sticky top-0 z-40 bg-white shadow-sm border-b border-gray-200"
            >
                <div
                    class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8"
                >
                    <!-- Mobile menu button -->
                    <button
                        @click="sidebarOpen = !sidebarOpen"
                        class="lg:hidden p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500"
                    >
                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                        </svg>
                    </button>

                    <!-- Page title -->
                    <div class="flex-1 min-w-0">
                        <h1
                            class="text-lg font-semibold text-gray-900 truncate"
                        >
                            {{ pageTitle }}
                        </h1>
                    </div>

                    <!-- User menu -->
                    <div class="relative ml-4 flex items-center space-x-4">
                        <!-- Notifications -->
                        <button
                            class="p-2 text-gray-400 hover:text-gray-500 relative"
                        >
                            <svg
                                class="h-6 w-6"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 17h5l-5 5v-5zM10.5 3.5a6 6 0 0 1 6 6v2l1.5 1.5v1h-13v-1L6.5 11.5v-2a6 6 0 0 1 6-6z"
                                />
                            </svg>
                            <span
                                v-if="newContactsCount > 0"
                                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center"
                            >
                                {{ newContactsCount }}
                            </span>
                        </button>

                        <!-- User dropdown -->
                        <div class="relative">
                            <button
                                @click="userMenuOpen = !userMenuOpen"
                                class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            >
                                <div
                                    class="h-8 w-8 rounded-full bg-blue-600 flex items-center justify-center"
                                >
                                    <span
                                        class="text-white font-medium text-sm"
                                    >
                                        {{
                                            $page.props.auth.user.name
                                                .charAt(0)
                                                .toUpperCase()
                                        }}
                                    </span>
                                </div>
                                <span class="ml-2 text-gray-700 font-medium">{{
                                    $page.props.auth.user.name
                                }}</span>
                                <svg
                                    class="ml-1 h-4 w-4 text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"
                                    />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div
                                v-show="userMenuOpen"
                                @click.away="userMenuOpen = false"
                                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200"
                            >
                                <div
                                    class="px-4 py-2 text-sm text-gray-500 border-b border-gray-100"
                                >
                                    {{ $page.props.auth.user.email }}
                                </div>
                                <Link
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                >
                                    Cerrar Sesión
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page content -->
            <main class="p-4 sm:p-6 lg:p-8">
                <slot />
            </main>
        </div>

        <!-- Mobile sidebar overlay -->
        <div
            v-show="sidebarOpen"
            @click="sidebarOpen = false"
            class="fixed inset-0 z-40 bg-gray-600 bg-opacity-75 lg:hidden"
        ></div>
    </div>
</template>

<script setup>
import { ref, computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import { route } from "../../utils/route.js";

defineProps({
    pageTitle: {
        type: String,
        default: "Dashboard",
    },
});

const sidebarOpen = ref(false);
const userMenuOpen = ref(false);

const page = usePage();

// La función route ya está importada desde utils/route.js

// Función para verificar ruta actual
const routeCurrent = (pattern) => {
    const currentPath = page.url;
    if (pattern.endsWith("*")) {
        const basePath = pattern.slice(0, -1);
        return currentPath.startsWith(basePath.replace("admin.", "/admin/"));
    }
    return currentPath === route(pattern);
};

// Contar contactos nuevos (esto se puede pasar desde el backend)
const newContactsCount = computed(() => {
    return page.props.newContactsCount || 0;
});
</script>
